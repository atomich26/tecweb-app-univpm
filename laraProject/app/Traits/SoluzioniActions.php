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

        if(!$malfunzionamento->exists())
           abort(404);
        
        return view ('admin.soluzione-form', [
            'title' => 'Inserisci una nuova soluzione', 
            'action' => 'insert',
            'prodottoID' => $prodottoID,
            'malfunzionamento' => $malfunzionamento]);
   
    }
   
    public function storeSoluzione(SoluzioneRequest $request, $prodottoID, $malfunzionamentoID){
        $malfunzionamento = Malfunzionamento::where('ID', $malfunzionamentoID)->where('prodottoID', $prodottoID)->first();

        if(!$malfunzionamento->exists())
           abort(404);
        
        $soluzione = new Soluzione();
        $soluzione->descrizione = $request->descrizione;
        $soluzione->malfunzionamentoID = $malfunzionamentoID;
   
        $soluzione->save();
        return response()->actionResponse(Auth::user()->role . '.soluzioni.table', ['prodottoID'=>$prodottoID, 'malfunzionamentoID'=>$malfunzionamentoID], 'successful', __('message.soluzione.insert'));
    }

    public function viewModifySoluzione($prodottoID, $malfunzionamentoID, $soluzioneID){
        $malfunzionamento = Malfunzionamento::where('ID', $malfunzionamentoID)->where('prodottoID', $prodottoID)->first();
        if(!$malfunzionamento->exists())
           return abort(404);
        
        $soluzione = Soluzione::where('malfunzionamentoID', $malfunzionamento->ID)->where('ID', $soluzioneID);
        
        if(!$soluzione->exists())
           return abort(404);

        return view('admin.soluzione-form', ['title' => "Modifica soluzione $soluzione->ID", 'action' => 'insert', 'malfunzionamento' => $malfunzionamento]);
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

    public function bulkDeleteSoluzioni(Request $request){
        if($request->items == null || strlen($request->items) < 1)
            return response()->actionResponse(Auth::user()->role . ".malfunzionamenti.table", ['prodottoID' => $request->prodottoID], 'error', 'Impossibile eliminare i malfunzionamenti selezionati. Controlla i parametri e riprova.');

        $items = explode(',', $request->items, config('laravel-table.value.rowsNumber'));
    
        Soluzione::where('malfunzionamentoID', $request->malfunzionamentoID)->whereIn('ID', $items)->delete();
    
        return response()->actionResponse(Auth::user()->role . ".soluzioni.table", ['prodottoID' => $request->prodottoID, 'malfunzionamentoID' => $request->malfunzionamentoID], 'successful', __('message.soluzione.bulk-delete'));
    }
}
