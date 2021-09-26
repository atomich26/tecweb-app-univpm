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

class AdminController extends Controller
{
    public function __construct(){

    }

    //funzioni dedicate agli users

    public function insertUtente(){
        $centri = DB::table('centri_assistenza')->pluck('ragione_sociale','ID');
        return view ('public.registraUser')->with('centri', $centri);
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


    public function modificaUser($userID){
        $centri = DB::table('centri_assistenza')->pluck('ragione_sociale','ID');
        $user = User::find($userID);
        return view ('public.modificauser')->with('user', $user)->with('centri',$centri);
    }

    public function updateUser(UserRequest $request, $userID){
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

    public function deleteUser($userID){
        $user = User::find($userID);
        $user->delete($userID);
        return redirect()->route('catalogo');
    }

    //Funzioni dedicate alle FAQ

    public function insertFAQ(){
        return view ('public.inserisciFAQ');
    }

    public function storeFAQ(FAQRequest $request){
        $faq = new Faq;
        $faq->fill($request->validated());
        $faq->save();
        return redirect()->route('faq');
    }

    public function modifyFAQ($faqID){
        $faq = Faq::find($faqID);
        if(!is_null($faq))
            return view ('public.modificaFAQ')->with('faq', $faq);
        else
            return redirect()->route('faq.new');
    }

    public function updateFAQ(FAQRequest $request, $faqID){
        $faq = Faq::find($faqID);
        $faq->domanda = $request->domanda;
        $faq->risposta = $request->domanda;
        $faq->save();

        return redirect()->route('faq');
    }

    public function deleteFAQ($faqID){
        Faq::find($faqID)->delete();

        return redirect()->return('faq');
    }

    //funzioni dedicate ai prodotti

    public function insertProdotto(){
        $users = DB::table('utenti')->where('role','staff')->pluck('username','ID');
        return view ('public.inserisciProdotto')->with('users', $users);

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

        if(!is_null($file)){
            $file->storeAs('/public/images/products/', $imageName);
        }

        return redirect()->route('catalogo');
    }

    public function modifyProdotto($productID){
        $users = DB::table('utenti')->where('role','staff')->pluck('username','ID');
        $product = Prodotto::find($productID);
        return view('public.modificaProdotto')->with('product',$product)->with('users', $users);

    }

    public function updateProdotto(ProductRequest $request, $productID){
        $product = Prodotto::find($productID);
        if($request->hasFile('file_img')){
            $image = $request->file('file_img');
            $imageName = $image->getClientOriginalName();
        }
        else{
            $imageName = $product->file_img;
        }

        $product->nome = $request->nome;
        $product->modello = $request->modello;
        $product->categoriaID = $request->categoriaID;
        $product->descrizione = $request->descrizione;
        $product->specifiche = $request->specifiche;
        $product->guida_installazione = $request->guida_installazione;
        $product->note_uso = $request->note_uso;
        $product->utenteID = $request->utenteID;
        $product->file_img = $imageName;
        $product->save();

        return redirect()->route('catalogo');
    }

    public function deleteProdotto($productID){ 
        $product = CentroAssistenza::find($productID);
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
        return view('public.inserisciCentro');
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
        return view('public.modificaCentro')->with('center', $center);
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

