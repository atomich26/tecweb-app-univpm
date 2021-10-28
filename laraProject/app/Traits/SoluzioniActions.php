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
        $malfunzionamento = Malfunzionamento::where('ID', $malfunzionamentoID)->where('prodottoID', $prodottoID);
        
        if(!$malfunzionamento->exists())
            abort(404);

        $table = new SoluzioniTable($malfunzionamentoID);

        return view('admin.datatable', ['title' => 'Gestisci soluzioni', 'table' => $table]);
    }

    public function viewInsertSoluzione($prodottoID, $malfunzionamentoID){   
        $malfunzionamento = Malfunzionamento::where('ID', $malfunzionamentoID)->where('prodottoID', $prodottoID)->first();

        if($malfunzionamento == null)
           abort(404);
        
        return view ('admin.soluzione-form', [
            'title' => 'Inserisci una nuova soluzione', 
            'action' => 'insert',
            'prodottoID' => $prodottoID,
            'malfunzionamento' => $malfunzionamento]);
   
    }
   
    public function storeSoluzione(SoluzioneRequest $request, $prodottoID, $malfunzionamentoID){
        $malfunzionamento = Malfunzionamento::where('ID', $malfunzionamentoID)->where('prodottoID', $prodottoID)->first();

        if($malfunzionamento == null)
           abort(404);
        
        $soluzione = new Soluzione();
        $soluzione->descrizione = $request->descrizione;
        $soluzione->malfunzionamentoID = $malfunzionamento->ID;
        $soluzione->save();

        return response()->actionResponse(Auth::user()->role . '.soluzioni.table', [
            'prodottoID'=>$prodottoID, 
            'malfunzionamentoID'=>$malfunzionamento->ID], 
            'successful', 
            __('message.soluzione.insert', ['item' => $malfunzionamentoID]));
    }

    public function viewModifySoluzione($prodottoID, $malfunzionamentoID, $soluzioneID){
        $malfunzionamento = Malfunzionamento::where('ID', $malfunzionamentoID)->where('prodottoID', $prodottoID)->first();
        
        if($malfunzionamento != null)
            $soluzione = Soluzione::where('malfunzionamentoID', $malfunzionamento->ID)->where('ID', $soluzioneID)->first();
        else
            return abort(404);

        if($soluzione == null)
           return abort(404);

        return view('admin.soluzione-form', [
            'title' => "Modifica soluzione " . $soluzione->ID, 
            'action' => 'modify', 
            'prodottoID' => $prodottoID, 
            'malfunzionamento' => $malfunzionamento,
            'soluzione' => $soluzione]);
    }

    public function updateSoluzione(SoluzioneRequest $request, $prodottoID, $malfunzionamentoID, $soluzioneID){
        $malfunzionamento = Malfunzionamento::where('ID', $malfunzionamentoID)->where('prodottoID', $prodottoID)->first();
        
        if($malfunzionamento->exists())
            $soluzione = Soluzione::where('malfunzionamentoID', $malfunzionamento->ID)->where('ID', $soluzioneID)->first();
        else
            return abort(404);

        if(!$soluzione->exists())
           return abort(404);

        $soluzione->descrizione = $request->descrizione;
        $soluzione->save();

        return response()->actionResponse(Auth::user()->role . '.soluzioni.table', [
            'prodottoID'=> $prodottoID, 
            'malfunzionamentoID' => $malfunzionamento->ID], 
            'successful', 
            __('message.soluzione.update', ['item' => $soluzione->ID]));
    }

    public function deleteSoluzione($prodottoID, $malfunzionamentoID, $soluzioneID){
       $malfunzionamento = Malfunzionamento::where('ID', $malfunzionamentoID)->where('prodottoID', $prodottoID)->first();
        
        if($malfunzionamento != null)
            $soluzione = Soluzione::where('malfunzionamentoID', $malfunzionamento->ID)->where('ID', $soluzioneID)->first();
        else
            return abort(404);

        if($soluzione == null)
           return abort(404);

        $soluzione->delete();
        
        return response()->actionResponse(Auth::user()->role . '.soluzioni.table', [
            'prodottoID'=> $prodottoID, 
            'malfunzionamentoID' => $malfunzionamento->ID],
            'successful',
            __('message.soluzione.delete', ['item' => $soluzioneID]));
    }

    public function bulkDeleteSoluzioni(Request $request){
        if($request->items == null || strlen($request->items) < 1)
            return response()->actionResponse(Auth::user()->role . ".malfunzionamenti.table", ['prodottoID' => $request->prodottoID], 'error', 'Impossibile eliminare i malfunzionamenti selezionati. Controlla i parametri e riprova.');

        $items = explode(',', $request->items, config('laravel-table.value.rowsNumber'));
    
        Soluzione::where('malfunzionamentoID', $request->malfunzionamentoID)->whereIn('ID', $items)->delete();
    
        return response()->actionResponse(Auth::user()->role . ".soluzioni.table", [
            'prodottoID' => $request->prodottoID, 
            'malfunzionamentoID' => $request->malfunzionamentoID], 
            'successful', 
            __('message.soluzione.bulk-delete'));
    }
}
