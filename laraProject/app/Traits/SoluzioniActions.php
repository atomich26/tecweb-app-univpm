<?php

namespace App\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\SoluzioneRequest;
use App\Models\Resources\Prodotto;
use App\Models\Resources\Malfunzionamento;
use App\Models\Resources\Soluzione;
use App\Tables\SoluzioniTable;

/**
 * Il trait Soluzioni definisce le funzioni che gestiscono le CRUD 
 * per le soluzioni associate ai malfunzionamenti di un prodotto
 */

trait SoluzioniActions
{   

    public function viewSoluzioniTable($prodottoID, $malfunzionamentoID){
        $table = new SoluzioniTable($malfunzionamentoID);

        return view('admin.datatable', ['title' => 'Gestisci soluzioni', 'table' => $table]);
    }

    public function insertSoluzione($productID, $malfunzionamentoID){
        $malfunzionamento = Malfunzionamento::find($malfunzionamentoID);
        $product = Prodotto::find($productID);
        
        if(!($malfunzionamento->prodottoID == $product->ID)){
            return response()->actionResponse(Auth::user()->role . ".prodotti.table", 'error', __('message.soluzione.not-exist'));
        }
        else
        return view ('admin.insert-soluzione')->with('product', $product)
                                                        ->with('malfunzionamento', $malfunzionamento);
   
    }
   
    public function saveSoluzione(SoluzioneRequest $request, $prodottoID, $malfunzionamentoID){
        
        $soluzione = new Soluzione;
        $soluzione->descrizione = $request->descrizione;
        $soluzione->malfunzionamentoID = $malfunzionamentoID;
   
        $soluzione->save();
        return redirect()->route(Auth::user()->role . '.soluzioni.table', ['prodotto'=>$prodottoID, 'malfunzionamento'=>$malfunzionamentoID]);
    }

    public function modifySoluzione($prodottoID, $malfunzionamentoID, $soluzioneID){
        $soluzione = Soluzione::find($soluzioneID);
        $malfunzionamento = Malfunzionamento::find($malfunzionamentoID);
        $prodotto = Prodotto::find($prodottoID);

        if(is_null($soluzione)||(!($soluzione->malfunzionamentoID == $malfunzionamento->ID)||(!($malfunzionamento->prodottoID==$prodotto->ID))))
        return redirect()->route(Auth::user()->role . '.soluzioni.table', ['prodotto'=> $prodotto->ID, 'malfunzionamento' => $malfunzionamento->ID, 'soluzione'=>$soluzione->ID]);
            

        return redirect()->route(Auth::user()->role . '.soluzione.modify', ['prodotto'=> $prodotto->ID, 'malfunzionamento' => $malfunzionamento->ID, 'soluzione'=>$soluzione->ID]);
    }

    public function updateSoluzione(SoluzioneRequest $request, $prodottID, $malfunzionamentoID, $soluzioneID){

        $soluzione = Soluzione::find($soluzioneID);
        $soluzione->descrizione = $request->descrizione;
        $soluzione->save();

        //return response()->actionResponse(Auth::user()->role . '.soluzioni.table', 'success', __('message.soluzione.update'));
        return redirect()->route(Auth::user()->role . '.soluzione.table', ['prodotto'=> $prodotto->ID, 'malfunzionamento' => $malfunzionamento->ID]);
        
    }

    public function deleteSoluzione($prodottoID, $malfunzionamentoID, $soluzioneID){
        $soluzione = Soluzione::find($soluzioneID);
        $malfunzionamento = Malfunzionamento::find($malfunzionamentoID);
        if(($malfunzionamento->prodottoID == $prodottoID)&&($soluzione->malfunzionamentoID==$malfunzionamento->ID)){
           
            $soluzione->delete($soluzioneID);
            return redirect()->route(Auth::user()->role . '.soluzione.table', ['prodotto'=> $prodotto->ID, 'malfunzionamento' => $malfunzionamento->ID]);
            //return response()->actionResponse(Auth::user()->role . '.soluzioni.table', 'success', __('message.soluzione.delete'));
        }
        
        else 
            //return response()->actionResponse(Auth::user()->role . '.soluzioni.table', 'error', __('message.soluzione.not-exist'));
            return redirect()->route(Auth::user()->role . '.soluzione.table', ['prodotto'=> $prodotto->ID, 'malfunzionamento' => $malfunzionamento->ID]);
    }

    public function bulkDeleteItems(Request $request){
       /* if($request->items == null || strlen($request->items) < 1)
            //return response()->actionResponse(Auth::user()->role . '.soluzioni.table', 'error', __('message.soluzione.not-selected'));
            return redirect()->route(Auth::user()->role . '.soluzione.table', ['prodotto'=> $prodotto->ID, 'malfunzionamento' => $malfunzionamento->ID]);*/

        $items = explode(',', $request->items, config('laravel-table.value.rowsNumber'));
        Soluzione::destroy($items);
        
            //return response()->actionResponse(Auth::user()->role . '.soluzioni.table', 'success', __('message.soluzione.bulk-delete'));
            return redirect()->route(Auth::user()->role . '.soluzione.table', ['prodotto'=> $prodotto->ID, 'malfunzionamento' => $malfunzionamento->ID]);
    }
}
