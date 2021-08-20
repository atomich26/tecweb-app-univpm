<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Request\UserRequest;
use App\Http\Request\FAQRequest;
use App\Models\Resources\Utente;
use App\Models\Resources\Faq;

class AdminController extends Controller
{
    public function __construct(){
        $this->middleware('can:isAdmin');
    }

    //funzioni dedicate agli users

    public function insertUtente(){
        return view ('pages.registraUser');
    }

    public function saveUtente(UserRequest $request){
        $user = new Utente;
        $user->username = $request->username;
        $user->password = Hash::make($request->password);
        $user->nome = $request->nome;
        $user->cognome = $request->cognome;
        $user->data_nascita = $request->dataNascita;
        $user->email = $request->email;
        $user->telefono = $request->telefono;
        $user->role = $request->role;
        if($user->role == 'tecnico'){
            $user->centroID = $request->centroID;
        }
        $user->save;
        foreach($request->prodotto as $prodotto){
            $prodotto->utenteID = $user->id;
        }

        return redirect()->route('home');

    }
    //funzioni dedicate alle FAQ
    
    public function insertFAQ(){
        return view ('pages.inserisciFAQ');
    }

    public function saveFAQ(FAQRequest $request){
        $faq = new Faq;
        $faq->domanda = $request->domanda;
        $faq->risposta = $request->risposta;
        return redirect()->route('faq');
    }

    public function modifyFAQ($faqId){
        $faq = Faq::find($faqId);
        return view ('pages.modificaFAQ')->with('faq', $faq);
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

    }

