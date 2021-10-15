<?php

namespace App\Traits;

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
/**
 * Il trait Malfunzionamenti definisce le funzioni che gestiscono le CRUD 
 * per i malfunzionamenti e le soluzioni
 */

trait CrudMalfunzionamenti
{
 //funzioni dedicate ai malfunzionamenti e soluzioni

 public function insertMalfunzionamento($productID)
 {   
     $product = Prodotto::find($productID);
     return view ('admin.insert-malfunzionamento')->with('product', $product);
   
 }

 public function saveMalfunzionamento(MalfunzionamentoRequest $request, $productID){
     $product = Prodotto::find($productID);
     $error = new Malfunzionamento;
     $error->prodottoID = $product->ID;
     $error->descrizione = $request->descrizione;
     $error->save();

     return view('public.prodotto')->with('prodotto', $product);
 }

 public function modifyMalfunzionamento($productID, $malfunzionamentoID){
     $malfunzionamento = Malfunzionamento::find($malfunzionamentoID);
     $product = Prodotto::find($productID);
     if(!($malfunzionamento->prodottoID == $product->ID)){
         abort(404);
     }
     else
     return view ('admin.modify-malfunzionamento')   ->with('product', $product)
                                                     ->with('malfunzionamento', $malfunzionamento);
 }

 public function updateMalfunzionamento(MalfunzionamentoRequest $request, $productID, $malfunzionamentoID){
     $error = Malfunzionamento::find($malfunzionamentoID);
     $error->descrizione = $request->descrizione;
     $productID = $error->prodottoID;
     $error->save();
     return redirect()->route('prodotto',['productID'=>$productID]);
 }

 public function deleteMalfunzionamento($malfunzionamentoID){
     $error = Malfunzionamento::find($malfunzionamentoID);
     $product = $error->prodottoID;
     $error->delete();
     return redirect()->route('prodotto',['productID'=>$productID]);
 }
}
