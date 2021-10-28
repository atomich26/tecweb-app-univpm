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
    public function viewMalfunzionamentiTable($prodottoID){
        $prodotto = Prodotto::find($prodottoID);
        $table = new MalfunzionamentiTable($prodotto->ID);

        return view('admin.datatable', ['title' => "Gestione malfunzionamenti prodotto $prodotto->ID", 'table' => $table]);
    }

    public function viewInsertMalfunzionamento($prodottoID){   
        $prodotto = Prodotto::find($prodottoID);

        return view ('admin.malfunzionamento-form', [
            'title' => 'Inserisci un nuovo malfunzionamento', 
            'action' => 'insert',
            'prodottoID' => $prodotto->ID]);
    }    
    
    public function storeMalfunzionamento(MalfunzionamentoRequest $request, $prodottoID){
        $prodotto = Prodotto::find($prodottoID);

        $malfunzionamento = new Malfunzionamento;
        $malfunzionamento->prodottoID = $prodotto->ID;
        $malfunzionamento->descrizione = $request->descrizione;
        $malfunzionamento->save();

        return response()->actionResponse(Auth::user()->role . '.malfunzionamenti.table', ['prodottoID' => $prodottoID], 'successful', __('message.malfunzionamento.insert'));
    }

    public function viewModifyMalfunzionamento($prodottoID, $malfunzionamentoID){
        $malfunzionamento = Malfunzionamento::where('prodottoID', $prodottoID)->where('ID', $malfunzionamentoID)->first();
        
        if($malfunzionamento == null)
            return response()->actionResponse(Auth::user()->role . ".prodotti.table", 'error', __('message.malfunzionamento.not-exists'));
        
        return view ('admin.malfunzionamento-form', [
            'title' => "Modifica malfunzionamento $malfunzionamento->ID",
            'action' => 'modify', 
            'prodottoID' => $prodottoID,
            'malfunzionamento' => $malfunzionamento]);
    }

    public function updateMalfunzionamento(MalfunzionamentoRequest $request, $prodottoID, $malfunzionamentoID){
        $malfunzionamento = Malfunzionamento::where('prodottoID', $prodottoID)->where('ID', $malfunzionamentoID)->first();

        if($malfunzionamento == null)
            return response()->actionResponse(Auth::user()->role . '.malfunzionamenti.table',['prodottoID' => $prodottoID], 'error', __('message.malfunzionamento.not-exists'));
        
        $malfunzionamento->descrizione = $request->descrizione;
        $malfunzionamento->save();

        return response()->actionResponse(Auth::user()->role . '.malfunzionamenti.table', ['prodottoID' => $prodottoID], 'successful', __('message.malfunzionamento.update', ['item' => $malfunzionamentoID]));
    }

    public function deleteMalfunzionamento($prodottoID, $malfunzionamentoID){
        $malfunzionamento = Malfunzionamento::where('prodottoID', $prodottoID)->where('ID', $malfunzionamentoID)->first();

        if($malfunzionamento == null)
            return response()->actionResponse(Auth::user()->role . '.malfunzionamenti.table', ['prodottoID' => $prodottoID], 'error', __('message.malfunzionamento.not-exists'));

        $malfunzionamento->delete();
        
        return response()->actionResponse(Auth::user()->role . '.malfunzionamenti.table', ['prodottoID' => $prodottoID], 'successful', __('message.malfunzionamento.delete', ['item' => $malfunzionamentoID]));
    }

    public function bulkDeleteMalfunzionamenti(Request $request){
        if($request->items == null || strlen($request->items) < 1)
            return response()->actionResponse(Auth::user()->role . ".malfunzionamenti.table", ['prodottoID' => $request->prodottoID], 'error', 'Impossibile eliminare i malfunzionamenti selezionati. Controlla i parametri e riprova.');

        $items = explode(',', $request->items, config('laravel-table.value.rowsNumber'));
        
        Malfunzionamento::where('prodottoID', $request->prodottoID)->whereIn('ID', $items)->delete();
        
        return response()->actionResponse(Auth::user()->role . ".malfunzionamenti.table", ['prodottoID' => $request->prodottoID], 'successful', __('message.malfunzionamento.bulk-delete'));
    }
}
