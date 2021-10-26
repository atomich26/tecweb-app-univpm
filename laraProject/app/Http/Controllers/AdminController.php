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
use Illuminate\Support\Facades\DB;
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

    public function saveUtente(UserRequest $request){
        if($request->hasFile('file_img')){
            $image = $request->file('file_img');
            $imageName = $image->getClientOriginalName();
        }
        else{
            $imageName = NULL;
        }

        $user = new User;
        $user->username = $request->username;
        $user->password = Hash::make($request->password);
        $user->nome = $request->nome;
        $user->cognome = $request->cognome;
        $user->file_img = $imageName;
        $user->data_nascita = $request->data_nascita;
        $user->email = $request->email;
        $user->telefono = $request->telefono;
        $user->role = $request->role;
       
        if($user->role == 'tecnico'){
            $user->centroID = $request->centroID;
        }
        $user->save();
        
        return redirect()->route('prodotti.table');
    }

    public function viewModifyUtente($utenteID){
        $centri = DB::table('centri_assistenza')->pluck('ragione_sociale','ID');
        $utente = User::find($utenteID);
        return view ('admin.utente-form', ['title' => 'Modifica ' . $utente->username, 'utente' => $utente, 'centri' => $centri, 'action' => 'modify']);
    }

    public function updateUtente(UserRequest $request, $userID){
        $user = User::find($userID);
        if($request->hasFile('file_img')){
            $image = $request->file('file_img');
            $imageName = $image->getClientOriginalName();
        }
        else{
            $imageName = $user->file_img;
        }

        $user->username = $request->username;
        $user->password = Hash::make($request->password);
        $user->nome = $request->nome;
        $user->cognome = $request->cognome;
        $user->file_img = $imageName;
        $user->data_nascita = $request->data_nascita;
        $user->email = $request->email;
        $user->telefono = $request->telefono;
        $user->role = $request->role;
        if($user->role == 'tecnico'){
            $user->centroID = $request->centroID;
            $prodotto = DB::table('utenti')->where('utenteID',$user->ID);
            $prodotto->utenteID = NULL;
        }
        if($user->role == 'staff'){
            $user->centroID = NULL;
        }
        $user->save();
        return redirect()->route('admin.utenti.table');
    }

    public function deleteUtente($utenteID){
        $user = User::find($utenteID);
        
        if($user === null)
            return response()->actionResponse(Auth::user()->role . '.utenti.table', 'error', __('message.utente.not-exist'));
        else if($user->checkRole('admin')){
            return response()->actionResponse(Auth::user()->role . '.utenti.table', 'error', "Non è consentito eliminare un amministratore!");
        }

        $user->delete($utenteID);
       
        return response()->actionResponse(Auth::user()->role . '.utenti.table', 'successful', __('message.utente.delete', ['item' => $user->username])); 
    }

    public function bulkDeleteUtenti(Request $request){        
        if($request->items == null || strlen($request->items) < 1)
            return response()->actionResponse(Auth::user()->role . ".utenti.table", 'error', 'Impossibile gli utenti selezionati. Controlla i parametri e riprova.');

        $items = explode(',', $request->items, config('laravel-table.value.rowsNumber'));
        User::destroy($items);
        
        return response()->actionResponse(Auth::user()->role . 'utenti.table', 'successful', 'message.utente.bulk-delete');
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

        return response()->actionResponse('admin.faq.table', 'successful', __('message.faq.insert'));
    }

    public function viewModifyFAQ($faqID){
        $faq = Faq::find($faqID);
        
        if($faq === null)
            return response()->actionResponse('admin.faq.new', 'error', __('message.faq.not-exist'));
        
        return view('admin.faq-form', ['title' => 'Modifica FAQ ' . $faq->ID, 'action' => 'modify', 'faq'=> $faq]);
    }

    public function updateFAQ(FAQRequest $request, $faqID){
        $faq = FAQ::find($faqID);

        if($faq === null)
            return response()->actionResponse('admin.faq.new', 'error', __('message.faq.not-exist'));

        $faq->fill($request->validated());
        $faq->save();

        return response()->actionResponse('admin.faq.table', 'successful', __('message.faq.update', ['item' => $faq->ID]));
    }

    public function deleteFAQ($faqID){
        $faq = FAQ::find($faqID);

        if($faq === null)
            return response()->actionResponse('admin.faq.table', 'error', __('message.faq.not-exist'));

        $faq->delete();

        return response()->actionResponse('admin.faq.table', 'successful', __('message.faq.delete', ['item' => $faqID]));
    }

    public function bulkDeleteFaq(Request $request){
        if($request->items == null || strlen($request->items) < 1)
            return response()->actionResponse("admin.faq.table", 'error', 'Impossibile eliminare le faq selezionate. Controlla i parametri e riprova.');

        $items = explode(',', $request->items, config('laravel-table.value.rowsNumber'));
        FAQ::destroy($items);
        
        return response()->actionResponse("admin.faq.table", 'successful', __('message.faq.bulk-delete'));
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
        $centro = new CentroAssistenza;
        $centro->fill($request->validate());
        $centro->save();

        return response()->actionResponse('admin.centri.table', 'successful', __('message.centro-assistenza.insert'));
    }

    public function viewModifyCentro($centroID){
        $centro = CentroAssistenza::find($centroID);

        if($centro === null)
            return response()->actionResponse('admin.insert-centro', 'successful', __('message.centro-assistenza.not-exists'));

        return view('admin.centro-assistenza-form', ['title' => 'Modifica ' . $centro->ragione_sociale, 'action' => 'modify', 'centro' => $centro]);
    }

    public function updateCentro(CentroRequest $request, $centroID){
        $centro = CentroAssistenza::find($centroID);

        if($centro === null)
            return response()->actionResponse('admin.insert-centro', 'successful', __('message.centro-assistenza.not-exists'));

        $centro->fill($request->validate());
        $centro->save();

        return response()->actionResponse('admin.centri.table', 'successful', __('message.centro-assistenza.update', ['item' => $centroID]));
    }

    public function deleteCentro($centroID){
        $centro = CentroAssistenza::find($centroID);
        
        if($centro === null)
            return response()->actionResponse('admin.centri.table', 'error', __('message.centro-assistenza.not-exist'));

        $centro->delete($centroID);

        return response()->actionResponse('admin.centri.table', 'successful', __('message.centro-assistenza.delete', ['item' => $centroID]));
    }

    public function bulkDeleteCentri(Request $request){
        if($request->items == null || strlen($request->items) < 1)
            return response()->actionResponse("admin.centri.table", 'error', 'Impossibile eliminare i centri assistenza selezionati. Controlla i parametri e riprova.');

        $items = explode(',', $request->items, config('laravel-table.value.rowsNumber'));
        CentroAssistenza::destroy($items);
    
        return response()->actionResponse("admin.centri.table", 'successful', __('message.centro-assistenza.bulk-delete'));
    }
}

