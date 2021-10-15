<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\UserRequest;
use App\Http\Requests\FAQRequest;
use App\Http\Requests\ProductRequest;
use App\Http\Requests\CenterRequest;
use App\Http\Requests\MalfunzionamentoRequest;
use App\Http\Requests\SoluzioneRequest;
use App\Models\Resources\Faq;
use App\Models\Resources\Prodotto;
use App\Models\Resources\CentroAssistenza;
use App\Models\Resources\Malfunzionamento;
use App\Models\Resources\Soluzione;
use Illuminate\Support\Facades\Route;
use App\Tables\ProdottiTable;
use App\Tables\FaqTable;
use App\Tables\UtentiTable;
use App\Tables\CentriAssistenzaTable;
use Illuminate\Database\Eloquent\Model;
use App\Traits\CrudMalfunzionamenti;
use App\Traits\CrudSoluzioni;

class AdminController extends Controller
{
    use CrudSoluzioni, CrudMalfunzionamenti;

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
        $user = User::findOrFail($utenteID);

        if(!$user->checkRole('admin')){
            return back()->with(['alertType', 'message'], ['error', "Non è consentito eliminare un amministratore!"]);
        }
        else if($user->checkRole('staff'))

            return back()->with(['alertType', 'message'], ['error', "Impossibile eliminare"]);
        Storage::delete('/public/images/profiles/' . $user->file_img);
        $user->delete($utenteID);
       // User::destroy($userID);
        return back(); 
    }

    public function bulkDeleteUtenti(Request $request){        
        $this->bulkDeleteItems($request->items, new User);
        return response()->actionResponse('utenti.table', 'successful', 'validation.action-messages.utente.bulk-delete');
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
       

        /*if($saved){
            if($action == 'close'){
                return redirect()->route('faq.table')
                    ->with('message','validation.action-messages.faq.insert')
                    ->with('status', 'successful');
            }
            else if($action == 'new'){
                return redirect()->route('faq.new')
                    ->with('message','validation.form-messages.insert.faq')
                    ->with('status', 'successful');
            }
        }
        else
            return redirect()->route('faq.table')->with('message', 'validation.form-messages.insert.');*/
    }

    public function modifyFAQView($faqID){
        $faq = Faq::find($faqID);
        
        if(!is_null($faq))
            return view ('admin.modify-faq')->with('faq', $faq);
        
        return response()->actionResponse('faq.new', 'error', 'validation.form-messages.faq.not-exist');
    }

    public function updateFAQ(FAQRequest $request, $faqID){ 
        if(is_null($faq))
            return response()->actionResponse('faq.new', 'error', __('validation.action-messages.faq.not-exist'));

        $this->storeFAQ($request, $faqID);

        return response()->actionResponse('faq.new', 'successful', __('validation.action-messages.faq.update'));
    }

    public function deleteFAQ($faqID){
        Faq::findOrFail($faqID)->delete();

        return response()->actionResponse('faq.table', 'successful', __('validation.action-messages.faq.delete'));
    }

    public function bulkDeleteFaq(Request $request){
        $perfomedAction = $this->bulkDeleteItems($request->items, new Faq());
        
        if($perfomedAction)
            return response()->actionResponse('faq.table', 'successful', __('validation.action-messages.faq.bulk-delete'));
        else
            return response()->actionResponse('faq.table', 'error', __('Alcuni elementi non sono stati eliminati.'));
    }

    public function bulkDeleteItems(String $itemsID, Model $model){
        if(!is_null($itemsID) && strlen($itemsID) > 0){
            $items = explode(',', $itemsID, 10);

            foreach($items as $itemID){
                $model::find($itemID)->delete();
            }
        }
    }
    // Metodi per le CRUD dei prodotti

    public function viewProdottiTable(){
        $table = new ProdottiTable();
        return view('admin.prodotti-table')->with('table', $table);
    }

    public function insertProdotto(){
        $users =  User::where('role','staff')->pluck('username','ID');
        return view ('admin.insert-prodotto')->with('users', $users);

    }

    public function storeProdotto(ProductRequest $request){
        $prodotto = new Prodotto();
        $prodotto->fill($request->validated());
        $prodotto->categoriaID = $request->categoriaID;

        if($request->hasFile('file_img')){
            $file = $request->file('file_img');
            $imageName = $request->modello . '.' . $file->getClientOriginalExtension();
        }
        else
            $imageName = NULL;

        $prodotto->file_img = $imageName;
        $prodotto->save();

        if(!is_null($imageName)){
            $file->storeAs('/public/images/products/', $imageName);
        }

        return redirect()->route('prodotti.table');
    }

    public function modifyProdottoView($prodottoID){
        $prodotto = Prodotto::find($prodottoID);
        
        if(!$prodotto)
            return response()->actionResponse('prodotto.new', 'error', 'validation.form-messages.prodotto.not-exist');

        $users = DB::table('utenti')->where('role','staff')->pluck('username','ID');
        return view('admin.modify-prodotto')->with('product', $prodotto)->with('users', $users);
    }

    public function updateProdotto(ProductRequest $request, $prodottoID){
        $prodotto = Prodotto::find($prodottoID);
        $prodotto->fill($request->validated());
        $prodotto->categoriaID = $request->categoriaID;

        if($request->hasFile('file_img')){
            $file = $request->file('file_img');
            $imageName = $file->getClientOriginalName();
        }
        else
            $imageName = NULL;

        $prodotto->file_img = $imageName;
        $prodotto->save();

        if(!is_null($imageName)){
            $file->storeAs('/public/images/products/', $imageName);
        }

        return redirect()->route('prodotti.table')
            ->with('message', 'validation.form-messages.update.prodotto')
            ->with('alertType', 'successful');
    }

    public function deleteProdotto($prodottoID){ 
        try {
            $prodotto = Prodotto::findOrFail($prodottoID);
        } catch (\Throwable $th) {
            return response()->actionResponse('prodotti.table', 
            'error', __('validation.action-messages.prodotto.not-exist',['item' => $prodottoID]));
        }
        Storage::delete('/public/images/products/' . $product->file_img);
        $prodotto->delete($prodottoID);

        return response()->actionResponse('prodotti.table', 'successful', __('validation.action-messages.prodotto.delete', ['item' => $prodotto->ID ]));
    }

    public function assignProdottiUtente(Request $request){
        $user = User::findOrFail($request->utenteID);

        if(!$user->checkRole('staff'))
            return response()->json([
                'status' => 'warning', 
                'message' => "L'utente <b>". $user->username . "</b> non è un membro dello staff."
            ], 400);
        
        foreach ($request->prodotti as $prodottoID) {
            $prodotto = Prodotto::findOrFail($prodottoID);
            
            if($prodotto->utenteID != $user->ID){
                $prodotto->utenteID = $user->ID;
                $prodotto->save();
            }
        }

        return response()->json(
            ['status' => 'successful', 
            'message' => "Assegnazione prodotti all'utente <b> " . $user->username . "</b> completata!"
        ], 200);
    }
   
    //funzioni dedicate ai centri

    public function viewCentriAssistenzaTable(){
        $table = new CentriAssistenzaTable();
        return view('admin.centri-assistenza-table')->with('table', $table);
    }

    public function insertCentro(){
        return view('admin.insert-centro');
    }

    public function saveCentro(CenterRequest $request){
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

    public function updateCentro(CenterRequest $request, $centerID){
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

