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

    public function index(){
        return view('admin.dashboard');
    }

    // Metodi per le CRUD degli utenti
    public function viewUtentiTable(){
        $table = new UtentiTable();
        return view('admin.utenti-table')->with('table', $table);
    }

    public function insertUtente(){
        $centriAssistenza = CentroAssistenza::all();
        $centriMap = array();
        
        foreach($centriAssistenza as $centro){
            $centriMap[$centro->ID] = $centro->ID . " - " . $centro->ragione_sociale;
        }

        return view ('admin.insert-utente')->with('centri', $centriMap);
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


    public function modifyUtente($userID){
        $centri = DB::table('centri_assistenza')->pluck('ragione_sociale','ID');
        $user = User::find($userID);
        return view ('admin.modify-utente')->with('user', $user)->with('centri',$centri);
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
        return redirect()->route('utenti.table');


    }

    public function deleteUtente($utenteID){
        try {
            $user = User::findOrFail($utenteID);
        } catch (\Throwable $th) {
            return response()->actionResponse('utenti.table', 'error', __('message.utente.not-exist'));
        }

        if($user->checkRole('admin')){
            return response()->actionResponse('utenti.table', 'error', "Non è consentito eliminare un amministratore!");
        }

        Storage::delete('/public/images/profiles/' . $user->file_img);
        $user->delete($utenteID);
       
        return response()->actionResponse('utenti.table', 'successful', __('message.utente.delete', ['item' => $user->username])); 
    }

    public function bulkDeleteUtenti(Request $request){        
        $this->bulkDeleteItems($request->items, new User);
        
        return response()->actionResponse('utenti.table', 'successful', 'message.utente.bulk-delete');
    }

    // Metodi per le CRUD delle faq       

    public function viewFaqTable(){
        $table = new FaqTable();
        return view('admin.faq-table')->with('table', $table);
    }

    public function insertFAQView(){
        return view ('admin.insert-faq');
    }

    public function storeFAQ(FAQRequest $request, $faqID = null){
        $action = $request->query('action');
        $faq = Faq::find($faqID);

        if($request->isMethod('post')){
            if(is_null($faq)){}
            
        }

        $faq->fill($request->validated());
        return $faq->save();
    }

    public function modifyFAQView($faqID){
        $faq = Faq::find($faqID);
        
        if(!is_null($faq))
            return view ('admin.modify-faq')->with('faq', $faq);
        
        return response()->actionResponse('faq.new', 'error', 'validation.form-messages.faq.not-exist');
    }

    public function updateFAQ(FAQRequest $request, $faqID){ 
        if(is_null($faq))
            return response()->actionResponse('faq.new', 'error', __('message.faq.not-exist'));

        $this->storeFAQ($request, $faqID);

        return response()->actionResponse('faq.new', 'successful', __('message.faq.update'));
    }

    public function deleteFAQ($faqID){
        try {
            Faq::findOrFail($faqID)->delete();
        } catch (\Throwable $th) {
            return response()->actionResponse('faq.table', 'error', __('message.faq.not-exist'));
        }

        return response()->actionResponse('faq.table', 'successful', __('message.faq.delete'));
    }

    public function bulkDeleteFaq(Request $request){
        $perfomedAction = $this->bulkDeleteItems($request->items, new Faq(), 'message.faq.bulk-delete');
        
        return $perfomedAction;
    }

    public function bulkDeleteItems(String $itemsID = null, Model $model, $success){
        if(is_null($itemsID) && strlen($itemsID) < 1)
            return response()->actionResponse('faq.table', 'error', 'Impossibile eliminare gli elementi selezionati.');
    
        $items = explode(',', $itemsID, config('laravel-table.value.rowsNumber'));
        $model::destroy($items);

        return response()->actionResponse('faq.table', 'successful', __($success));
    }
    
    //funzioni dedicate ai centri

    public function viewCentriAssistenzaTable(){
        $table = new CentriAssistenzaTable();
        return view('admin.centri-assistenza-table')->with('table', $table);
    }

    public function insertCentro(){
        return view('admin.insert-centro');
    }

    public function saveCentro(CentroRequest $request){
        $center = new CentroAssistenza;
        $center->ragione_sociale = $request->ragione_sociale;
        $center->telefono = $request->telefono;
        $center->email = $request->email;
        $center->sito_web = $request->sito_web;
        $center->descrizione = $request->descrizione;
        $center->via = $request->via;
        $center->città = $request->città;
        $center->cap = $request->cap;

        $center->save();

        return redirect()->route('centri.table');

    }

    public function modifyCentro($centerID){
        $center=CentroAssistenza::find($centerID);
        return view('admin.modify-centro')->with('centro.modify', $center);
    }

    public function updateCentro(CentroRequest $request, $centerID){
        $center = CentroAssistenza::find($centerID);
        $center->ragione_sociale = $request->ragione_sociale;
        $center->telefono = $request->telefono;
        $center->email = $request->email;
        $center->sito_web = $request->sito_web;
        $center->descrizione = $request->descrizione;
        $center->via = $request->via;
        $center->città = $request->città;
        $center->cap = $request->cap;
        $center->save();

        return redirect()->route('centri.table');

    }

    public function deleteCentro($centerID){
        $center = CentroAssistenza::find($centerID);
        $center->delete($centerID);

        return redirect()->return('centri.table');
    }

}

