<?php

namespace App\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\MalfunzionamentoRequest;
use App\Models\Resources\Prodotto;
use App\Tables\MalfunzionamentiTable;
use App\Models\Resources\Malfunzionamento;
use App\Models\Resources\Soluzione;


/**
 * Il trait Malfunzionamenti definisce le funzioni che gestiscono le CRUD 
 * per i malfunzionamenti e le soluzioni
 */

trait MalfunzionamentiActions
{
    public function viewMalfunzionamentiTable(Request $request){
        
        $prodotto = Prodotto::find($request->prodottoID);
        $table = new MalfunzionamentiTable($prodotto->ID);

        return view('admin.datatable', ['title' => "Gestione malfunzionamenti prodotto $prodotto->ID", 'table' => $table]);
    }

    //funzioni dedicate ai malfunzionamenti e soluzioni
    public function insertMalfunzionamento($prodottoID){   
        $prodotto = Prodotto::find($prodottoID);

        return view (Auth::user()->role . '.insert-malfunzionamento')->with('prodotto', $prodotto);
    }    
    
    public function saveMalfunzionamento(MalfunzionamentoRequest $request, $prodottoID){
    
        $prodotto = Prodotto::find($prodottoID);
        $error = new Malfunzionamento;
        $error->prodottoID = $prodotto->ID;
        $error->descrizione = $request->descrizione;
        $error->save();

        return redirect()->route(Auth::user()->role . 'malfunzionamenti-table');
    }

    public function modifyMalfunzionamento($prodottoID, $malfunzionamentoID){
        $malfunzionamento = Malfunzionamento::find($malfunzionamentoID);
        $prodotto = Prodotto::find($prodottoID);
        
        if(!($malfunzionamento->prodottoID == $prodotto->ID))
            return response()->actionResponse(Auth::user()->role . ".prodotti.table", 'error', __('message.malfunzionamento.not-found'));
        
        return view ('forms.modify-malfunzionamento')
            ->with('prodotto', $prodotto)
            ->with('malfunzionamento', $malfunzionamento);
    }

    public function updateMalfunzionamento(MalfunzionamentoRequest $request, $prodottoID, $malfunzionamentoID){
        $error = Malfunzionamento::find($malfunzionamentoID);

        if($error == null)
            return response()->actionResponse(Auth::user()->role . '.malfunzionamenti.table', __('message.malfunzionamento.not-exists'));
        
        $error->descrizione = $request->descrizione;
        $prodottoID = $error->prodottoID;
        $error->save();

        return redirect()->route(Auth::user()->role . '.malfunzionamenti.table', ['prodottoID' => $prodottoID]);
    }

    public function deleteMalfunzionamento($prodottoID, $malfunzionamentoID){
        $malfunzionamento = Malfunzionamento::find($malfunzionamentoID);

        if($malfunzionamento == null)
            //return response()->responseAction(Auth::user()->role . '.malfunzionamenti.table', 'error', __('message.malfunzionamento.not-exists'));
            return redirect()->route(Auth::user()->role . '.malfunzionamenti.table', ['prodottoID' => $prodottoID]);
        else if($malfunzionamento->prodottoID != $prodottoID)
            //return response()->responseAction(Auth::user()->role . '.malfunzionamenti.table', 'error', __('message.prodotto.not-exists'));
            return redirect()->route(Auth::user()->role . '.malfunzionamenti.table', ['prodottoID' => $prodottoID]);

        $malfunzionamento->delete();

        /*return response()->actionResponse(Auth::user()->role . '.malfunzionamenti.table', 'successful', __());
        return redirect()->route(Auth::user()->role . '.malfunzionamenti.table', ['prodottoID' => $prodottoID]);
            return response()->responseAction(Auth::user()->role . '.malfunzionamenti.table', ['prodottoID' => $prodottoID], 'error', __('message.malfunzionamento.not-exists'));
        else if($malfunzionamento->prodottoID != $prodottoID)
            return response()->responseAction(Auth::user()->role . '.malfunzionamenti.table', ['prodottoID' => $prodottoID],  'error', __('message.malfunzionamento.not-exists'));

        $malfunzionamento->delete();

        return response()->actionResponse(Auth::user()->role . '.malfunzionamenti.table', ['prodottoID' => $prodottoID], 'successful', __('message.malfunzionamento.delete'));*/
    }

    public function bulkDeleteMalfunzionamenti(Request $request){
        if($request->items == null || strlen($request->items) < 1)
            return response()->actionResponse(Auth::user()->role . ".malfunzionamenti.table", ['prodottoID' => $request->prodottoID], 'error', 'Impossibile eliminare i malfunzionamenti selezionati. Controlla i parametri e riprova.');

        $items = explode(',', $request->items, config('laravel-table.value.rowsNumber'));
        Malfunzionamento::destroy($items);
        
        return response()->actionResponse(Auth::user()->role . ".malfunzionamenti.table", ['prodottoID' => $request->prodottoID], 'successful', __('message.prodotto.bulk-delete'));
    }
}
