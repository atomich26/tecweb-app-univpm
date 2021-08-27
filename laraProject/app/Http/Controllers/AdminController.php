<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\UserRequest;
use App\Http\Requests\FAQRequest;
use App\Http\Requests\ProductRequest;
use App\Models\Resources\Utente;
use App\Models\Resources\Faq;
use App\Models\Resources\Prodotto;
use APP\Models\Resources\CentroAssistenza;

class AdminController extends Controller
{
    public function __construct(){
        $this->middleware('can:isAdmin');
    }

    //funzioni dedicate agli users

    public function insertUtente(){
        $centri = DB::table('centri_assistenza')->pluck('ragione_sociale','ID');
        return view ('public.registraUser')->with('centri', $centri);
    }

    public function saveUtente(UserRequest $request){
        $user = new Utente;
        $user->username = $request->username;
        $user->password = Hash::make($request->password);
        $user->nome = $request->nome;
        $user->cognome = $request->cognome;
        $user->data_nascita = $request->data_nascita;
        $user->email = $request->email;
        $user->telefono = $request->telefono;
        $user->role = $request->role;
        if($user->role == 'tecnico'){
            $user->centroID = $request->centroID;
        }
        $user->save;
        return redirect()->route('home');

    }


    //funzioni dedicate alle FAQ

    public function insertFAQ(){
        return view ('public.inserisciFAQ');
    }

    public function saveFAQ(FAQRequest $request){
        $faq = new Faq;
        $faq->domanda = $request->domanda;
        $faq->risposta = $request->risposta;
        $faq->save();
        return redirect()->route('faq');
    }

    public function modifyFAQ($faqId){
        $faq = Faq::find($faqId);
        return view ('public.modificaFAQ')->with('faq', $faq);
    }

    public function updateFAQ(FAQRequest $request, $faqId){
        $faq = Faq::find($faqId);
        $faq->domanda = $request->domanda;
        $faq->risposta = $request->domanda;
        $faq->save();

        return redirect()->route('faq');
    }

    public function deleteFAQ($faqId){
        $faq = Faq::find($faqId);
        $faq->delete($faqId);

        return redirect()->return('faq');
    }

    //funzioni dedicate ai prodotti

    public function insertProdotto(){
        return view ('public.inserisciProdotto');

    }

    public function saveProdotto(ProductRequest $request){
        if($request->hasFile('file_img')){
            $image = $request->file('file_img');
            $imageName = $image->getClientOriginalName();
        }
        else{
            $imageName = NULL;
        }

        $product = new Prodotto;
        $product->nome = $request->nome;
        $product->modello = $request->modello;
        $product->categoriaID = $request->categoriaID;
        $product->descrizione = $request->descrizione;
        $product->specifiche = $request->specifiche;
        $product->guida_installazione = $request->guida_installazione;
        $product->note_uso = $request->note_uso;
        $product->file_img = $imageName;
        $product->save();

        return redirect()->route('catalogo');
    }

    }

