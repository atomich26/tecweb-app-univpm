<?php

namespace App\Http\Controllers;

use App\User;
use App\Tables\FaqTable;
use App\Tables\UtentiTable;
use Illuminate\Http\Request;
use App\Models\Resources\Faq;
use App\Traits\ProdottiActions;
use App\Traits\SoluzioniActions;
use App\Http\Requests\FAQRequest;
use App\Http\Requests\UserRequest;
use App\Models\Resources\Prodotto;
use App\Http\Requests\CentroRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use App\Tables\CentriAssistenzaTable;
use Illuminate\Database\Eloquent\Model;
use App\Traits\MalfunzionamentiActions;
use Illuminate\Support\Facades\Storage;
use App\Models\Resources\CentroAssistenza;

class AdminController extends Controller
{
    use SoluzioniActions, MalfunzionamentiActions, ProdottiActions;

    public function __construct(){
        $this->middleware('can:isAdmin');
    }

    // Metodi per le CRUD degli utenti
    public function viewUtentiTable(){
        $table = new UtentiTable();
        
        return view('admin.datatable', ['title' => 'Gestione utenti', 'table' => $table]);
    }

    public function viewInsertUtente(){
        $centriAssistenza = CentroAssistenza::all()->pluck('ragione_sociale', 'ID');

        return view('admin.utente-form', ['title' => 'Inserisci un nuovo utente', 'action' => 'insert', 'centri' => $centriAssistenza]);
    }

    public function storeUtente(UserRequest $request){
        $utente = new User;
        $this->fillUtente($request, $utente);
        
        return response()->actionResponse(Auth::user()->role . '.utenti.table', null, 'successful', __('message.utente.insert'));
    }

    public function viewModifyUtente($utenteID){
        $centri = CentroAssistenza::pluck('ragione_sociale','ID');
        $utente = User::find($utenteID);

        if($utente == NULL)
            return response()->actionResponse(Auth::user()->role . '.utente.new', null, 'error', __('message.utente.not-exist'));

        return view ('admin.utente-form', ['title' => 'Modifica ' . $utente->username, 'utente' => $utente, 'centri' => $centri, 'action' => 'modify']);
    }

    public function updateUtente(UserRequest $request, $utenteID){
        $utente = User::find($utenteID);

        if($utente == null)
            return response()->actionResponse(Auth::user()->role . '.utenti.table', null, 'error', __('message.utente.not-exist'));

        $this->fillUtente($request, $utente);

        return response()->actionResponse(Auth::user()->role . '.utenti.table', null, 'successful', __('message.utente.update', ['item' => $utente->username]));
    }

    public function deleteUtente($utenteID){
        $utente = User::find($utenteID);
        
        if($utente === null)
            return response()->actionResponse(Auth::user()->role . '.utenti.table', null, 'error', __('message.utente.not-exist'));
        else if($utente->checkRole('admin')){
            return response()->actionResponse(Auth::user()->role . '.utenti.table', null,  'error', "Non è consentito eliminare un amministratore!");
        }

        $utente->delete($utenteID);
       
        return response()->actionResponse(Auth::user()->role . '.utenti.table', null, 'successful', __('message.utente.delete', ['item' => $utente->username])); 
    }

    public function bulkDeleteUtenti(Request $request){        
        if($request->items == null || strlen($request->items) < 1)
            return response()->actionResponse(Auth::user()->role . ".utenti.table", null, 'error', 'Impossibile gli utenti selezionati. Controlla i parametri e riprova.');

        $items = explode(',', $request->items, config('laravel-table.value.rowsNumber'));
        User::destroy($items);
        
        return response()->actionResponse(Auth::user()->role . 'utenti.table', null, 'successful', 'message.utente.bulk-delete');
    }

    public function assignUtentiToCentro(Request $request){
        $selected = $request->optionSelectedID;
        
        $containsNotTecnico = User::whereIn('ID', $request->items)->where('role', '!=', 'tecnico')->exists();

        if($containsNotTecnico)
            return response()->json(['alert' => 'warning', 'message' => 'Puoi effettuare l\'assegnazione solo agli utenti con il ruolo di tecnico. Riprova.'], 400);
    
        $isAlreadyAssigned = User::whereIn('ID', $request->items)->where('centroID', $selected)->exists();

        if($isAlreadyAssigned)
            return response()->json(['alert' => 'warning', 'message' => "Alcuni tecnici selezionati sono stati già assegnati al centro assistenza scelto. Riprova."], 400);

        User::whereIn('ID', $request->items)->update(['centroID' => $selected]);

        return response()->json([
            'alert' => 'successful',
            'message' => 'Assegnazione utenti completata.']);
    }

    public function eliminaImmagineUtente(Request $request){
        $utente = User::findOrFail($request->utenteID);
        Storage::delete('/public/images/profiles/' . $utente->file_img);
        $utente->file_img = NULL;
        $utente->save();
        
        return response()->json(['alert' => 'successful', 'message' => 'Immagine attuale rimossa']);
    }

    public function fillUtente(UserRequest $request, User $utente){
        $utente->username = $request->username;
        $utente->password = Hash::make($request->password);
        $utente->nome = $request->nome;
        $utente->cognome = $request->cognome;
        $utente->data_nascita = $request->data_nascita;
        $utente->email = $request->email;
        $utente->telefono = $request->telefono;
       
        // Se il ruolo del membro cambia in tecnico, tutti i prodotti a lui assegnati sono resi disponibili per tutto lo staff.
        if($request->role == "tecnico"){
            $utente->centroID = $request->centroID;
            
            if($utente->role == 'staff')
                Prodotto::where('utenteID', $utente->ID)->update(['utenteID' => null]);
        }
        else
            $utente->centroID = NULL;

        $utente->role = $request->role;

        //Controlla se è presente l'immagine
        if($request->hasFile('file_img')){
            $file = $request->file('file_img');
            $imageName = $request->username . '-' . date('Y_m_d_H_i_s') . '.' . $file->getClientOriginalExtension();
        }
        else{
            $imageName = NULL;
        }

        if($imageName != NULL){
            if($utente->file_img != NULL && rtrim($utente->file_img) !='')
                Storage::delete('/public/images/profiles/' . $utente->file_img);
            
            $utente->file_img = $imageName;
            $file->storeAs('/public/images/profiles/', $imageName);
        }
        else if($utente->file_img == NULL)
            $utente->file_img = $imageName;
        
        $utente->save();
    }

    // Metodi per le CRUD delle faq       
    public function viewFaqTable(){
        $table = new FaqTable();

        return view('admin.datatable', ['title' => 'Gestione FAQ', 'table' => $table]);
    }

    public function viewInsertFAQ(){
        return view ('admin.faq-form', ['title' => 'Inserisci una nuova FAQ', 'action' => 'insert']);
    }

    public function storeFAQ(FAQRequest $request){
        $faq = new FAQ();
        $faq->fill($request->validated());
        $faq->save();

        return response()->actionResponse('admin.faq.table', ['sort_by' => 'updated_at', 'sort_dir'=> 'desc', 'rows' => 10], 'successful', __('message.faq.insert'));
    }

    public function viewModifyFAQ($faqID){
        $faq = Faq::find($faqID);
        
        if($faq === null)
            return response()->actionResponse('admin.faq.new', null, 'error', __('message.faq.not-exist'));
        
        return view('admin.faq-form', ['title' => 'Modifica FAQ ' . $faq->ID, 'action' => 'modify', 'faq'=> $faq]);
    }

    public function updateFAQ(FAQRequest $request, $faqID){
        $faq = FAQ::find($faqID);

        if($faq === null)
            return response()->actionResponse('admin.faq.new', null, 'error', __('message.faq.not-exist'));

        $faq->fill($request->validated());
        $faq->save();

        return response()->actionResponse('admin.faq.table', ['sort_by' => 'updated_at', 'sort_dir'=> 'desc', 'rows' => 10], 'successful', __('message.faq.update', ['item' => $faq->ID]));
    }

    public function deleteFAQ($faqID){
        $faq = FAQ::find($faqID);

        if($faq === null)
            return response()->actionResponse('admin.faq.table', null,  'error', __('message.faq.not-exist'));

        $faq->delete();

        return response()->actionResponse('admin.faq.table', null, 'successful', __('message.faq.delete', ['item' => $faqID]));
    }

    public function bulkDeleteFaq(Request $request){
        if($request->items == null || strlen($request->items) < 1)
            return response()->actionResponse("admin.faq.table", null,'error', 'Impossibile eliminare le faq selezionate. Controlla i parametri e riprova.');

        $items = explode(',', $request->items, config('laravel-table.value.rowsNumber'));
        FAQ::destroy($items);
        
        return response()->actionResponse("admin.faq.table", null, 'successful', __('message.faq.bulk-delete'));
    }
    
    //Metodi per le CRUD per i centri assistenza
    public function viewCentriAssistenzaTable(){
        $table = new CentriAssistenzaTable();

        return view('admin.datatable', ['title' => 'Gestione centri assistenza', 'table' => $table]);
    }

    public function viewInsertCentro(){
        return view('admin.centro-assistenza-form', ['title' => 'Inserisci un nuovo centro assistenza', 'action' => 'insert']);
    }

    public function storeCentro(CentroRequest $request){
        $centro = new CentroAssistenza();
        $centro->fill($request->validated());
        $centro->save();

        return response()->actionResponse('admin.centri.table', ['sort_by' => 'updated_at', 'sort_dir'=> 'desc', 'rows' => 10], 'successful', __('message.centro-assistenza.insert'));
    }

    public function viewModifyCentro($centroID){
        $centro = CentroAssistenza::find($centroID);

        if($centro === null)
            return response()->actionResponse('admin.centro.new', null, 'successful', __('message.centro-assistenza.not-exist'));

        return view('admin.centro-assistenza-form', ['title' => 'Modifica ' . $centro->ragione_sociale, 'action' => 'modify', 'centro' => $centro]);
    }

    public function updateCentro(CentroRequest $request, $centroID){
        $centro = CentroAssistenza::find($centroID);

        if($centro === null)
            return response()->actionResponse('admin.insert-centro', null, 'successful', __('message.centro-assistenza.not-exists'));

        $centro->fill($request->validated());
        $centro->save();

        return response()->actionResponse('admin.centri.table', ['sort_by' => 'updated_at', 'sort_dir'=> 'desc', 'rows' => 10], 'successful', __('message.centro-assistenza.update', ['item' => $centroID]));
    }

    public function deleteCentro($centroID){
        $centro = CentroAssistenza::find($centroID);
        
        if($centro === null)
            return response()->actionResponse('admin.centri.table', null, 'error', __('message.centro-assistenza.not-exist'));

        $centro->delete($centroID);

        return response()->actionResponse('admin.centri.table', null, 'successful', __('message.centro-assistenza.delete', ['item' => $centroID]));
    }

    public function bulkDeleteCentri(Request $request){
        if($request->items == null || strlen($request->items) < 1)
            return response()->actionResponse("admin.centri.table", null, 'error', 'Impossibile eliminare i centri assistenza selezionati. Controlla i parametri e riprova.');

        $items = explode(',', $request->items, config('laravel-table.value.rowsNumber'));
        CentroAssistenza::destroy($items);
    
        return response()->actionResponse("admin.centri.table", null, 'successful', __('message.centro-assistenza.bulk-delete'));
    }
}

