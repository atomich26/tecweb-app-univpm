<?php

namespace App\Http\Controllers;

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
use App\User;
use App\Models\Resources\Faq;
use App\Models\Resources\Prodotto;
use App\Models\Resources\CentroAssistenza;
use Illuminate\Support\Facades\Route;
use App\Tables\ProdottiTable;
use App\Tables\FaqTable;
use App\Tables\UtentiTable;

class AdminController extends Controller
{
    public function __construct(){

    }

    public function index(){
        return view('admin.dashboard');
    }

    //Funzioni CRUD utente

    public function viewUtentiTable(){
        $table = new UtentiTable();
        return view('admin.utenti-table')->with('table', $table->view());
    }

    public function insertUtente(){
        $centri = DB::table('centri_assistenza')->pluck('ragione_sociale','ID');
        return view ('admin.insert-utente')->with('centri', $centri);
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
        return redirect()->route('catalogo');
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
        return redirect()->route('catalogo');


    }

    public function deleteUtente($userID){
        $user = User::find($userID);
        storage()->delete('/public/images/profiles/' . $user->file_img);
        $user->delete($userID);
        return redirect()->route('catalogo');
    }

    public function deleteSelectedUtenti(Request $request){      
      
        if(!is_null($request->items) && strlen($request->items) > 0){
            $users = explode(',', $request->items, 10);
        
            foreach($users as $userID){
                User::destroy($userID);
            }
        }

        return redirect()->route('utenti.table');
    }

    //Funzioni dedicate alle FAQ

    public function viewFaqTable(){
        $table = new FaqTable();
        return view('admin.faq-table')->with('table', $table->index());
    }

    public function insertFAQ(){
        return view ('admin.insert-faq');
    }

    public function storeFAQ(FAQRequest $request, $faqID = null){
        $callback = $request->query('callback');

        $faq = Faq::find($faqID);

        if(is_null($faq))
            $faq = new FAQ;
            /*return redirect()->route('faq.new')
                ->with('message','validation.form-messages.not-exist.faq')
                ->with('alertType', 'error');*/

        $faq->fill($request->validated());
        $saved = $faq->save();

        if($saved){
            if($callback == 'close'){
                return redirect()->route('faq')
                    ->with('message','validation.form-messages.insert.faq')
                    ->with('alertType', 'successful');
            }
            else if($callback == 'new'){
                return redirect()->route('faq.new')
                    ->with('message','validation.form-messages.insert.faq')
                    ->with('alertType', 'successful');
            }
            else{
                $currentFaq = Faq::orderByDesc('created_at')->first();

                return redirect()->route('faq.modify', ['faqID' => $currentFaq->ID])
                    ->with('message','validation.form-messages.insert.faq')
                    ->with('alertType', 'successful');
            }
        }
        else
            return abort(500);
    }

    public function modifyFAQ($faqID){
        $faq = Faq::find($faqID);

        if(is_null($faq)){
            return redirect()->route('faq.new')
                ->with('message','validation.form-messages.not-exist.faq')
                ->with('alertType', 'error');
        }
        else
            return view ('admin.modify-faq')->with('faq', $faq);
    }

    public function updateFAQ(FAQRequest $request, $faqID){
        $faq = Faq::find($faqID);
        $faq->fill($request->validated());
        $faq->save();

        if(is_null($faq)){
            return redirect()->route('faq.new')
                ->with('message','validation.form-messages.not-exist.faq')
                ->with('alertType', 'error');
        }
        else{
            return redirect()->route('faq')->with('message','validation.form-messages.update.faq')
            ->with('alertType', 'successful');
        }
    }

    public function deleteFAQ($faqID){
        Faq::find($faqID)->delete();

        return redirect()->return('faq');
    }

    //funzioni dedicate ai prodotti

    public function viewProdottiTable(){
        $table = new ProdottiTable();
        return view('admin.prodotti-table')->with('table', $table->index());
    }

    public function insertProdotto(){
        $users = DB::table('utenti')->where('role','staff')->pluck('username','ID');
        return view ('admin.insert-prodotto')->with('users', $users);

    }

    public function storeProdotto(ProductRequest $request){
        $prodotto = new Prodotto;
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

        return redirect()->route('catalogo');
    }

    public function modifyProdotto($productID){
        $users = DB::table('utenti')->where('role','staff')->pluck('username','ID');
        $product = Prodotto::find($productID);
        return view('admin.modify-prodotto')->with('product',$product)->with('users', $users);

    }

    public function updateProdotto(ProductRequest $request, $prodottoID){
        $prodotto = Prodotto::find($prodottoID);
        $prodotto->fill($request->validated());
        $prodotto->categoriaID = $request->categoriaID;

        if($request->hasFile('file_img')){
            $file = $request->file('file_img');
            $imageName = $file.getClientOriginalName();
        }
        else
            $imageName = NULL;

        $prodotto->file_img = $imageName;
        $prodotto->save();

        if(!is_null($imageName)){
            $file->storeAs('/public/images/products/', $imageName);
        }

        return redirect()->route('catalogo')
            ->with('message', 'validation.form-messages.update.prodotto')
            ->with('alertType', 'successful');
    }

    public function deleteProdotto($productID){ 
        $product = Prodotto::find($productID);
        $product->delete($productID);

        return redirect()->route('catalogo');

    }

    //funzioni dedicate ai malfunzionamenti e soluzioni

    public function insertMalfunzionamento($productID)
    {
        return view ('public.InserisciMalfunzionamenti')->with('product', $productID);
      
    }

    public function saveMalfunzionamento(MalfunzionamentoRequest $request, $productID){
        $product = Prodotto::find($productID);
        $error = new Malfunzionamento;
        $error->prodottoID = $product->ID;
        $error->descrizione = $request->descrizione;
        $error->save();

        return redirect()->route('prodotto')->with('product', $productID);
    }

    public function modifyMalfunzionamento($malfunzionamentoID){
        $error = Malfunzionamento::find($malfunzionamentoID);
        $product = $error->prodottoID;
        return view ('public.ModificaMalfunzionamenti')->with('product', $productID)
                                                        ->with('malfunzionamento', $error);
    }

    public function updateMalfunzionamento(MalfunzionamentoRequest $request, $malfunzionamentoID){
        $error = Malfunzionamento::find($malfunzionamentoID);
        $error->descrizione = $request->descrizione;
        $error->save();

        $productID = $error->prodottoID;
        return redirect()->route('prodotto')->with('product', $productID);
    }

    public function deleteMalfunzionamento($malfunzionamentoID){
        $error = Malfunzionamento::find($malfunzionamentoID);
        $error->delete();
        return redirect()->route('prodotto')->with('product', $productID);
    }

    //funzioni dedicate ai centri

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

        return redirect()->route('catalogo');

    }

    public function modifyCentro($centerID){
        $center=CentroAssistenza::find($centerID);
        return view('admin.modify-centro')->with('center', $center);
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

        return redirect()->route('catalogo');

    }

    public function deleteCentro($centerID){
        $center = CentroAssistenza::find($centerID);
        $center->delete($centerID);

        return redirect()->return('catalogo');
    }

}

