<?php

namespace App\Traits;

use Illuminate\Http\Request;
use App\Http\Requests\SoluzioneRequest;
use App\Models\Resources\Prodotto;
use App\Models\Resources\Malfunzionamento;
use App\Models\Resources\Soluzione;

/**
 * Il trait Soluzioni definisce le funzioni che gestiscono le CRUD 
 * per le soluzioni associate ai malfunzionamenti di un prodotto
 */

trait SoluzioniActions
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
