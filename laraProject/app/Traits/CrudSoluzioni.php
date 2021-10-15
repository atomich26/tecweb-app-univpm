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
 * Il trait Soluzioni definisce le funzioni che gestiscono le CRUD 
 * per le soluzioni associate ai malfunzionamenti di un prodotto
 */

trait CrudSoluzioni
{   
    public function insertSoluzione($productID, $malfunzionamentoID){
        $malfunzionamento = Malfunzionamento::find($malfunzionamentoID);
        $product = Prodotto::find($productID);
        if(!($malfunzionamento->prodottoID == $product->ID)){
            abort(404);
        }
        else
        return view ('admin.insert-soluzione') ->with('product', $product)
                                                        ->with('malfunzionamento', $malfunzionamento);
   
    }
   
    public function saveSoluzione(SoluzioneRequest $request, $productID, $malfunzionamentoID){
        
        $soluzione = new Soluzione;
        $soluzione->descrizione = $request->descrizione;
        $soluzione->malfunzionamentoID = $malfunzionamentoID;
   
        $soluzione->save();
        return redirect()->route('prodotto',['productID'=>$productID]);
    }
}
