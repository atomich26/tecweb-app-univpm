<?php

namespace App\Traits;

use App\User;
use Illuminate\Http\Request;
use App\Tables\ProdottiTable;
use App\Models\Resources\Prodotto;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Requests\ProdottoRequest;
use Illuminate\Support\Facades\Storage;

/**
 * Il trait ProdottiActions definisce le funzioni che gestiscono le CRUD 
 * per i prodotti
 */

trait ProdottiActions
{
    public function viewProdottiTable(){
        $table = new ProdottiTable();

        return view('admin.datatable', ['title' => 'Gestione prodotti', 'table' => $table]);
    }

    public function viewInsertProdotto(){
        $staffUtenti =  User::where('role','staff')->pluck('username','ID');

        return view('admin.prodotto-form', [
            'title' => 'Inserisci un nuovo prodotto',
            'staffUtenti' => $staffUtenti,
            'action' => 'insert']);
    }

    public function storeProdotto(ProdottoRequest $request){
        $prodotto = new Prodotto();
        $this->fillProdotto($request, $prodotto);

        return response()->actionResponse(Auth::user()->role . '.prodotti.table', null, 'successful', __('message.prodotto.insert'));
    }

    public function viewModifyProdotto($prodottoID){
        $prodotto = Prodotto::find($prodottoID);
        
        if($prodotto == null)
            return response()->actionResponse('prodotto.new', null, 'error', __('message.prodotto.not-exist'));

        $staffUtenti = User::where('role','staff')->pluck('username','ID');

        return view('admin.prodotto-form', [
            'title' => "Modifica prodotto $prodotto->name",
            'prodotto' => $prodotto,
            'staffUtenti' => $staffUtenti,
            'action' => 'modify']);
    }

    public function updateProdotto(ProdottoRequest $request, $prodottoID){
        $prodotto = Prodotto::find($prodottoID);

        if($prodotto == null)
            return response()->actionResponse('prodotto.new', null, 'error', __('message.prodotto.not-exist'));

        $this->fillProdotto($request, $prodotto);

        return response()->actionResponse(Auth::user()->role . '.prodotti.table', null, 'successful', __('message.prodotto.update', ['item' => $prodotto->ID]));
    }

    public function deleteProdotto($prodottoID){ 
        $prodotto = Prodotto::find($prodottoID);
        
        if($prodotto == null)
            return response()->actionResponse(Auth::user()->role . '.prodotti.table', null, 
            'error', __('message.prodotto.not-exist',['item' => $prodottoID]));
        
        $prodotto->delete($prodottoID);

        return response()->actionResponse('admin.prodotti.table', null, 'successful', __('message.prodotto.delete', ['item' => $prodotto->ID ]));
    }
    
    public function assignProdottiToUtente(Request $request){
        $selected = $request->optionSelectedID;
    
        $isAlreadyAssigned = Prodotto::whereIn('ID', $request->items)->where('utenteID', $selected)->exists();
        
        if($isAlreadyAssigned)
            return response()->json(['alert' => 'warning', 'message' => "Alcuni prodotti selezionati sono stati già assegnati all'utente scelto. Riprova."], 400);

        Prodotto::whereIn('ID', $request->items)->update(['utenteID' => $selected]);

        return response()->json([
            'alert' => 'successful',
            'message' => 'Assegnazione prodotti completata.', 
            'updated_at' => Prodotto::find($request->items[0])->updated_at->format('d/m/Y H:i')], 200);
    }
   
    public function bulkDeleteProdotti(Request $request){
        if($request->items == null || strlen($request->items) < 1)
            return response()->actionResponse("admin.prodotti.table", null, 'error', 'Impossibile eliminare i prodotti selezionati. Controlla i parametri e riprova.');

        $items = explode(',', $request->items, config('laravel-table.value.rowsNumber'));
        Prodotto::destroy($items);
        
        return response()->actionResponse("admin.prodotti.table", null, 'successful', __('message.prodotto.bulk-delete'));
    }

    public function eliminaImmagineProdotto(Request $request){
        $prodotto = Prodotto::findOrFail($request->prodottoID);
        Storage::delete('/public/images/products/' . $prodotto->file_img);
        $prodotto->file_img = NULL;
        $prodotto->save();
        
        return response()->json(['alert' => 'successful', 'message' => 'Immagine attuale rimossa']);
    }

    protected function fillProdotto(ProdottoRequest $request, Prodotto $prodotto){
        $current = $prodotto->file_img;

        $prodotto->nome = $request->nome;
        $prodotto->modello = $request->modello;
        $prodotto->categoriaID = $request->categoriaID;
        $prodotto->descrizione = $request->descrizione;
        $prodotto->specifiche = $request->specifiche;
        $prodotto->guida_installazione = $request->guida_installazione;
        $prodotto->note_uso = $request->note_uso;
        $prodotto->utenteID = $request->utenteID;

        if($request->has('current') && $request->current == $prodotto->file_img){
            $imageName = NULL;
        }
        else if($request->hasFile('file_img')){
            $file = $request->file('file_img');
            $imageName = $request->modello . '.' . $file->getClientOriginalExtension();
        } 
        else
            $imageName = NULL;

        if(!is_null($imageName)){

            $file->storeAs('/public/images/products/', $imageName);
        }
        $prodotto->save();
    }
}