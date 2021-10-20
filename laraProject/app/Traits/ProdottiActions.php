<?php

namespace App\Traits;

use App\User;
use Illuminate\Http\Request;
use App\Tables\ProdottiAdminTable;
use App\Models\Resources\Prodotto;
use Illuminate\Support\Facades\Gate;
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
        $table = new ProdottiAdminTable();

        return view('admin.prodotti-table')->with('table', $table);
    }

    public function insertProdotto(){
        $users =  User::where('role','staff')->pluck('username','ID');

        return view ('admin.insert-prodotto')->with('users', $users);

    }

    public function storeProdotto(ProdottoRequest $request){
        $prodotto = new Prodotto();
        $prodotto->fill($request->validated());
        $prodotto->categoriaID = $request->categoriaID;

        if($request->hasFile('file_img')){
            $file = $request->file('file_img');
            $imageName = $request->modello . '.' . $file->getClientOriginalExtension();
        }
        else
            $imageName = NULL;

        $prodotto->file_img = $imageName;
        $prodotto->save();

        if(!is_null($imageName)){
            $file->storeAs('/public/images/products/', $imageName);
        }

        return redirect()->route('prodotti.table');
    }

    public function modifyProdottoView($prodottoID){
        $prodotto = Prodotto::find($prodottoID);
        
        if(!$prodotto)
            return response()->actionResponse('prodotto.new', 'error', 'validation.form-messages.prodotto.not-exist');

        $users = DB::table('utenti')->where('role','staff')->pluck('username','ID');
        return view('admin.modify-prodotto')->with('product', $prodotto)->with('users', $users);
    }

    public function updateProdotto(ProdottoRequest $request, $prodottoID){
        $prodotto = Prodotto::find($prodottoID);
        $prodotto->fill($request->validated());
        $prodotto->categoriaID = $request->categoriaID;

        if($request->hasFile('file_img')){
            $file = $request->file('file_img');
            $imageName = $file->getClientOriginalName();
        }
        else
            $imageName = NULL;

        $prodotto->file_img = $imageName;
        $prodotto->save();

        if(!is_null($imageName)){
            $file->storeAs('/public/images/products/', $imageName);
        }

        return redirect()->route('prodotti.table')
            ->with('message', 'validation.form-messages.update.prodotto')
            ->with('alertType', 'successful');
    }

    public function deleteProdotto($prodottoID){ 
        try {
            $prodotto = Prodotto::findOrFail($prodottoID);
        } catch (\Throwable $th) {
            return response()->actionResponse('prodotti.table', 
            'error', __('message.prodotto.not-exist',['item' => $prodottoID]));
        }
        Storage::delete('/public/images/products/' . $prodotto->file_img);
        $prodotto->delete($prodottoID);

        return response()->actionResponse('prodotti.table', 'successful', __('message.prodotto.delete', ['item' => $prodotto->ID ]));
    }
    
    public function assignProdottiUtente(Request $request){
        $selected = $request->utenteID;

        $isAlreadyAssigned = Prodotto::whereIn('ID', $request->prodotti)->where('utenteID', $selected)->exists();
        
        if($isAlreadyAssigned)
            return response()->json(['alert' => 'warning', 'message' => "Alcuni prodotti selezionati sono stati già assegnati all'utente scelto. Riprova."], 400);

        Prodotto::whereIn('ID', $request->prodotti)->update(['utenteID' => $selected]);

        return response()->json([
            'alert' => 'successful',
            'message' => 'Assegnazione prodotti completata.', 
            'updated_at' => Prodotto::find($request->prodotti[0])->updated_at->format('d/m/Y H:i')], 200);
    }
   
    public function bulkDeleteProdotti(Request $request){
        
    }
}