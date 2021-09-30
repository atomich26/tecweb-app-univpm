<?php

namespace App\Http\Controllers;

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
use App\Tables\ProdottiTable;
use App\Tables\FaqTable;
use App\Tables\UtentiTable;
use App\Tables\CentriAssistenzaTable;

class AdminController extends Controller
{
    public function __construct(){
        $this->middleware('can:isAdmin');
    }

    public function index(){
        return view('admin.dashboard');
    }

    //Funzioni CRUD utente

    public function viewUtentiTable(){
        $table = new UtentiTable();
        return view('admin.utenti-table')->with('table', $table);
    }

    public function insertUtente(){
        $centri = DB::table('centri_assistenza')->pluck('ragione_sociale','ID');
        return view ('admin.insert-utente')->with('centri', $centri);
    }

    public function saveUtente(UserRequest $request){
        if($request->hasFile('file_img')){
            $image = $request->file('file_img');
            $imageName = $image->getClientOriginalName();
        }
        else{
            $imageName = NULL;
        }

        $user = new User;
        $user->username = $request->username;
        $user->password = Hash::make($request->password);
        $user->nome = $request->nome;
        $user->cognome = $request->cognome;
        $user->file_img = $imageName;
        $user->data_nascita = $request->data_nascita;
        $user->email = $request->email;
        $user->telefono = $request->telefono;
        $user->role = $request->role;
        if($user->role == 'tecnico'){
            $user->centroID = $request->centroID;
        }
        $user->save();
        return redirect()->route('catalogo');
    }


    public function modifyUtente($userID){
        $centri = DB::table('centri_assistenza')->pluck('ragione_sociale','ID');
        $user = User::find($userID);
        return view ('admin.modify-utente')->with('user', $user)->with('centri',$centri);
    }

    public function updateUtente(UserRequest $request, $userID){
        $user = User::find($userID);
        if($request->hasFile('file_img')){
            $image = $request->file('file_img');
            $imageName = $image->getClientOriginalName();
        }
        else{
            $imageName = $user->file_img;
        }
        $user->username = $request->username;
        $user->password = Hash::make($request->password);
        $user->nome = $request->nome;
        $user->cognome = $request->cognome;
        $user->file_img = $imageName;
        $user->data_nascita = $request->data_nascita;
        $user->email = $request->email;
        $user->telefono = $request->telefono;
        $user->role = $request->role;
        if($user->role == 'tecnico'){
            $user->centroID = $request->centroID;
            $prodotto = DB::table('utenti')->where('utenteID',$user->ID);
            $prodotto->utenteID = NULL;
        }
        if($user->role == 'staff'){
            $user->centroID = NULL;
        }
        $user->save();
        return redirect()->route('catalogo');


    }

    public function deleteUtente($utenteID){
        $user = User::findOrFail($utenteID);

        if(!$user->checkRole('admin')){
            return back()->with('error', "Non è consentito eliminare un amministratore!");
        }
        else if($user->checkRole('staff'))

            return back()->with('error', 'kokokok');
        Storage::delete('/public/images/profiles/' . $user->file_img);
        $user->delete($userID);
        User::destroy($userID);
        return back(); 
    }

    public function bulkDeleteUtenti(Request $request){        
        if(!is_null($request->items) && strlen($request->items) > 0){
            $utenti = explode(',', $request->items, 10);
            foreach($utenti as $utenteID){
                $this->deleteUtente($utenteID);
            }
        }
        return back();
    }

    //Funzioni dedicate alle FAQ

    public function viewFaqTable(){
        $table = new FaqTable();
        return view('admin.faq-table')->with('table', $table);
    }

    public function insertFAQ(){
        return view ('admin.insert-faq');
    }

    public function storeFAQ(FAQRequest $request, $faqID = null){
        $callback = $request->query('callback');

        $faq = Faq::find($faqID);

        if(is_null($faq))
            $faq = new FAQ;
            /*return redirect()->route('faq.new')
                ->with('message','validation.form-messages.not-exist.faq')
                ->with('alertType', 'error');*/

        $faq->fill($request->validated());
        $saved = $faq->save();

        if($saved){
            if($callback == 'close'){
                return redirect()->route('faq')
                    ->with('message','validation.form-messages.insert.faq')
                    ->with('alertType', 'successful');
            }
            else if($callback == 'new'){
                return redirect()->route('faq.new')
                    ->with('message','validation.form-messages.insert.faq')
                    ->with('alertType', 'successful');
            }
            else{
                $currentFaq = Faq::orderByDesc('created_at')->first();

                return redirect()->route('faq.modify', ['faqID' => $currentFaq->ID])
                    ->with('message','validation.form-messages.insert.faq')
                    ->with('alertType', 'successful');
            }
        }
        else
            return abort(500);
    }

    public function modifyFAQ($faqID){
        $faq = Faq::find($faqID);

        if(is_null($faq)){
            return redirect()->route('faq.new')
                ->with('message','validation.form-messages.not-exist.faq')
                ->with('alertType', 'error');
        }
        else
            return view ('admin.modify-faq')->with('faq', $faq);
    }

    public function updateFAQ(FAQRequest $request, $faqID){
        $faq = Faq::find($faqID);
        $faq->fill($request->validated());
        $faq->save();

        if(is_null($faq)){
            return redirect()->route('faq.new')
                ->with('message','validation.form-messages.not-exist.faq')
                ->with('alertType', 'error');
        }
        else{
            return redirect()->route('faq')->with('message','validation.form-messages.update.faq')
            ->with('alertType', 'successful');
        }
    }

    public function deleteFAQ($faqID){
        Faq::find($faqID)->delete();

        return redirect()->return('faq');
    }

    //funzioni dedicate ai prodotti

    public function viewProdottiTable(){
        $table = new ProdottiTable();
        return view('admin.prodotti-table')->with('table', $table);
    }

    public function insertProdotto(){
        $users = DB::table('utenti')->where('role','staff')->pluck('username','ID');
        return view ('admin.insert-prodotto')->with('users', $users);

    }

    public function storeProdotto(ProductRequest $request){
        $prodotto = new Prodotto;
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

        return redirect()->route('catalogo');
    }

    public function modifyProdotto($productID){
        $users = DB::table('utenti')->where('role','staff')->pluck('username','ID');
        $product = Prodotto::find($productID);
        return view('admin.modify-prodotto')->with('product',$product)->with('users', $users);

    }

    public function updateProdotto(ProductRequest $request, $prodottoID){
        $prodotto = Prodotto::find($prodottoID);
        $prodotto->fill($request->validated());
        $prodotto->categoriaID = $request->categoriaID;

        if($request->hasFile('file_img')){
            $file = $request->file('file_img');
            $imageName = $file.getClientOriginalName();
        }
        else
            $imageName = NULL;

        $prodotto->file_img = $imageName;
        $prodotto->save();

        if(!is_null($imageName)){
            $file->storeAs('/public/images/products/', $imageName);
        }

        return redirect()->route('catalogo')
            ->with('message', 'validation.form-messages.update.prodotto')
            ->with('alertType', 'successful');
    }

    public function deleteProdotto($productID){ 
        $product = Prodotto::find($productID);
        $product->delete($productID);

        return redirect()->route('catalogo');

    }

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

    public function insertSoluzione($productID, $malfunzionamentoID){
        $malfunzionamento = Malfunzionamento::find($malfunzionamentoID);
        $product = Prodotto::find($productID);
        if(!($malfunzionamento->prodottoID == $product->ID)){
            abort(404);
        }
        else
        return view ('admin.insert-soluzione')   ->with('product', $product)
                                                        ->with('malfunzionamento', $malfunzionamento);

    }

    public function saveSoluzione(SoluzioneRequest $request, $productID, $malfunzionamentoID){
        
        $soluzione = new Soluzione;
        $soluzione->descrizione = $request->descrizione;
        $soluzione->malfunzionamentoID = $malfunzionamentoID;

        $soluzione->save();
        return redirect()->route('prodotto',['productID'=>$productID]);
    }

    //funzioni dedicate ai centri

    public function viewCentriAssistenzaTable(){
        $table = new CentriAssistenzaTable();
        return view('admin.centri-assistenza-table')->with('table', $table);
    }

    public function insertCentro(){
        return view('admin.insert-centro');
    }

    public function saveCentro(CenterRequest $request){
        $center = new CentroAssistenza;
        $center->ragione_sociale = $request->ragione_sociale;
        $center->telefono = $request->telefono;
        $center->email = $request->email;
        $center->sito_web = $request->sito_web;
        $center->descrizione = $request->descrizione;
        $center->via = $request->via;
        $center->città = $request->città;
        $center->cap = $request->cap;

        $center->save();

        return redirect()->route('catalogo');

    }

    public function modifyCentro($centerID){
        $center=CentroAssistenza::find($centerID);
        return view('admin.modify-centro')->with('center', $center);
    }

    public function updateCentro(CenterRequest $request, $centerID){
        $center = CentroAssistenza::find($centerID);
        $center->ragione_sociale = $request->ragione_sociale;
        $center->telefono = $request->telefono;
        $center->email = $request->email;
        $center->sito_web = $request->sito_web;
        $center->descrizione = $request->descrizione;
        $center->via = $request->via;
        $center->città = $request->città;
        $center->cap = $request->cap;
        $center->save();

        return redirect()->route('catalogo');

    }

    public function deleteCentro($centerID){
        $center = CentroAssistenza::find($centerID);
        $center->delete($centerID);

        return redirect()->return('catalogo');
    }

}

