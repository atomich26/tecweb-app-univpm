<?php

use Illuminate\Http\Request;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Rotte al PublicController;

Route::redirect('/', 'catalogo');

Route::redirect('home', 'catalogo', 302);

Route::get('catalogo','PublicController@viewCatalogo')->name('catalogo.view');

Route::get('catalogo/cerca', 'PublicController@searchCatalogo')->name('catalogo.search');

Route::get('/catalogo/{prodottoID}', function(Request $request){
    return redirect()->route('catalogo.view', ['prodotto' => $request->prodottoID]);                             
})->name('prodotto.view');

Route::get('centri-assistenza','PublicController@viewCentriAssistenzaPage')->name('centri-assistenza');

Route::view('legali','pages.legali')->name('legali');

Route::get('faq','PublicController@viewFaqPage')->name('faq');

// Rotte pagine statiche
Route::view('chi-siamo','public.chi-siamo')->name('chi-siamo');

Route::view('informativa-privacy','public.privacy')->name('privacy');

// Rotte dedicate agli utenti
Route::get('profilo',function() {
    return view('users.user-profile')->with('user', Auth::user());
})->name('user.profile')->middleware('can:hasProfilePage');

// Rotte per l'autenticazione
Route::redirect('accedi', 'login', 302);

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login-form');

Route::post('login','Auth\LoginController@login')->name('user-login');

Route::post('logout', 'Auth\LoginController@logout')->name('user-logout');

Route::prefix('staff')->group(function () {

    Route::redirect('/', 'staff/gestione-prodotti', 302)->name('staff.index');

    Route::get('gestione-prodotti', 'StaffController@viewProdottiTable')->name('staff.prodotti.table');

    Route::middleware('editProdotto')->group(function(){ 

        //Rotte CRUD per i prodotti
        Route::get('modifica-prodotto/{prodottoID}', 'StaffController@viewModifyProdotto')->name('staff.prodotto.modify');
        Route::put('modifica-prodotto/{prodottoID}', 'StaffController@updateProdotto')->name('staff.prodotto.update');
    
        //Rotte CRUD per i malfunzionamenti
        Route::get('prod/{prodottoID}/gestione-malfunzionamenti', 'StaffController@viewMalfunzionamentiTable')->name('staff.malfunzionamenti.table');
        Route::get('prod/{prodottoID}/inserisci-malfunzionamento', 'StaffController@viewInsertMalfunzionamento')->name('staff.malfunzionamento.new');
        Route::post('prod/{prodottoID}/inserisci-malfunzionamento', 'StaffController@storeMalfunzionamento')->name('staff.malfunzionamento.store');
        Route::get('prod/{prodottoID}/modifica-malfunzionamento/{malfunzionamentoID}', 'StaffController@viewModifyMalfunzionamento')->name('staff.malfunzionamento.modify');
        Route::put('prod/{prodottoID}/modifica-malfunzionamento/{malfunzionamentoID}', 'StaffController@updateMalfunzionamento')->name('staff.malfunzionamento.update');
        Route::delete('prod/{prodottoID}/elimina-malfunzionamento/{malfunzionamentoID}', 'StaffController@deleteMalfunzionamento')->name('staff.malfunzionamento.delete');
        Route::delete('prod/{prodottoID}/elimina-malfunzionamenti', 'StaffController@bulkDeleteMalfunzionamenti')->name('staff.malfunzionamenti.bulk-delete');
        
        //Rotte CRUD per le soluzioni
        Route::get('prod/{prodottoID}/malfuzionamento/{malfunzionamentoID}/gestione-soluzioni', 'StaffController@viewSoluzioniTable')->name('staff.soluzioni.table');
        Route::get('prod/{prodottoID}/malfunzionamento/{malfunzionamentoID}/inserisci-soluzione', 'StaffController@viewInsertSoluzione')->name('staff.soluzione.new');
        Route::post('prod/{prodottoID}/malfunzionamento/{malfunzionamentoID}/inserisci-soluzione/{soluzioneID}', 'StaffController@storeSoluzione')->name('staff.soluzione.store');
        Route::get('prod/{prodottoID}/malfunzionamento/{malfunzionamentoID}/modifica-soluzione/{soluzioneID}', 'StaffController@viewModifySoluzione')->name('staff.soluzione.modify');
        Route::put('prod/{prodottoID}/malfunzionamento/{malfunzionamentoID}/modifica-soluzione/{soluzioneID}', 'StaffController@updateSoluzione')->name('staff.soluzione.update');       
        Route::delete('prod/{prodottoID}/malfunzionamento/{malfunzionamentoID}/elimina-soluzione/{soluzioneID}', 'StaffController@deleteSoluzione')->name('staff.soluzione.delete');       
        Route::delete('prod/{prodottoID}/malfunzionamento/{malfunzionamentoID}/elimina-soluzioni', 'StaffController@bulkDeleteSoluzioni')->name('staff.soluzioni.bulk-delete');       
    });
});

Route::prefix('admin')->group(function(){
    
    Route::redirect('/', 'admin/gestione-prodotti', 302)->name('admin.index');
    
    Route::get('gestione-prodotti', 'AdminController@viewProdottiTable')->name('admin.prodotti.table');
    Route::get('inserisci-prodotto', 'AdminController@viewInsertProdotto')->name('admin.prodotto.new');
    Route::post('inserisci-prodotto', 'AdminController@storeProdotto')->name('admin.prodotto.store');
    Route::post('assegna-prodotti', 'AdminController@assignProdottiToUtente')->name('admin.prodotti.assign');
    Route::get('modifica-prodotto/{prodottoID}', 'AdminController@viewModifyProdotto')->name('admin.prodotto.modify');
    Route::put('modifica-prodotto/{prodottoID}', 'AdminController@updateProdotto')->name('admin.prodotto.update');
    Route::delete('elimina-prodotto/{prodottoID}', 'AdminController@deleteProdotto')->name('admin.prodotto.delete');
    Route::delete('elimina-prodotti', 'AdminController@bulkDeleteProdotti')->name('admin.prodotti.bulk-delete');
    
    //Rotte CRUD per le FAQ
    Route::get('gestione-faq', 'AdminController@viewFaqTable')->name('admin.faq.table');
    Route::get('inserisci-faq', 'AdminController@viewInsertFAQ')->name('admin.faq.new');
    Route::post('inserisci-faq', 'AdminController@storeFAQ')->name('admin.faq.store');
    Route::get('modifica-faq/{faqID}', 'AdminController@viewModifyFAQ')->name('admin.faq.modify');
    Route::put('modifica-faq/{faqID}', 'AdminController@updateFAQ')->name('admin.faq.update');
    Route::delete('elimina-faq/{faqID}', 'AdminController@deleteFAQ')->name('admin.faq.delete');
    Route::delete('elimina-faq', 'AdminController@bulkDeleteFaq')->name('admin.faq.bulk-delete');
   
    //Rotte CRUD per gli utenti
    Route::get('gestione-utenti', 'AdminController@viewUtentiTable')->name('admin.utenti.table');
    Route::get('inserisci-utente', 'AdminController@viewInsertUtente')->name('admin.utente.new');
    Route::post('inserisci-utente', 'AdminController@saveUtente')->name('admin.utente.store');
    Route::get('modifica-utente/{utenteID}', 'AdminController@viewModifyUtente')->name('admin.utente.modify');
    Route::put('modifica-utente/{utenteID}', 'AdminController@updateUtente')->name('admin.utente.update');
    Route::post('assegna-utenti', 'AdminController@assignUtentiToCentro')->name('admin.utenti.assign');
    Route::delete('elimina-utente/{utenteID}', 'AdminController@deleteUtente')->name('admin.utente.delete'); 
    Route::delete('elimina-utenti', 'AdminController@bulkDeleteUtenti')->name('admin.utenti.bulk-delete');

    //Rotte CRUD per i centri assistenza
    Route::get('gestione-centri-assistenza', 'AdminController@viewCentriAssistenzaTable')->name('admin.centri.table');
    Route::get('inserisci-centro', 'AdminController@viewInsertCentro')->name('admin.centro.new');
    Route::post('inserisci-centro', 'AdminController@storeCentro')->name('admin.centro.store');
    Route::get('modifica-centro/{centroID}','AdminController@viewModifyCentro')->name('admin.centro.modify');
    Route::put('modifica-centro/{centroID}','AdminController@updateCentro')->name('admin.centro.update');
    Route::delete('elimina-centro/{centroID}', 'AdminController@deleteCentro')->name('admin.centro.delete');
    Route::delete('elimina-centri', 'AdminController@bulkDeleteCentri')->name('admin.centri.bulk-delete');
    
    //Rotte CRUD per i malfunzionamenti
    Route::get('prod/{prodottoID}/gestione-malfunzionamenti', 'AdminController@viewMalfunzionamentiTable')->name('admin.malfunzionamenti.table');
    Route::get('prod/{prodottoID}/inserisci-malfunzionamento', 'AdminController@viewInsertMalfunzionamento')->name('admin.malfunzionamento.new');
    Route::post('prod/{prodottoID}/inserisci-malfunzionamento', 'AdminController@storeMalfunzionamento')->name('admin.malfunzionamento.store');
    Route::get('prod/{prodottoID}/modifica-malfunzionamento/{malfunzionamentoID}', 'AdminController@viewModifyMalfunzionamento')->name('admin.malfunzionamento.modify');
    Route::put('prod/{prodottoID}/modifica-malfunzionamento/{malfunzionamentoID}', 'AdminController@updateMalfunzionamento')->name('admin.malfunzionamento.update');
    Route::delete('prod/{prodottoID}/elimina-malfunzionamento/{malfunzionamentoID}', 'AdminController@deleteMalfunzionamento')->name('admin.malfunzionamento.delete');
    Route::delete('prod/{prodottoID}/elimina-malfunzionamenti', 'AdminController@bulkDeleteMalfunzionamenti')->name('admin.malfunzionamenti.bulk-delete');
    
    //Rotte CRUD per le soluzioni
    Route::get('prod/{prodottoID}/malfunzionamento/{malfunzionamentoID}/gestione-soluzioni', 'AdminController@viewSoluzioniTable')->name('admin.soluzioni.table');
    Route::get('prod/{prodottoID}/malfunzionamento/{malfunzionamentoID}/inserisci-soluzione', 'AdminController@viewInsertSoluzione')->name('admin.soluzione.new');
    Route::post('prod/{prodottoID}/malfunzionamento/{malfunzionamentoID}/inserisci-soluzione', 'AdminController@storeSoluzione')->name('admin.soluzione.store');
    Route::get('prod/{prodottoID}/malfunzionamento/{malfunzionamentoID}/modifica-soluzione/{soluzioneID}', 'AdminController@viewModifySoluzione')->name('admin.soluzione.modify');
    Route::put('prod/{prodottoID}/malfunzionamento/{malfunzionamentoID}/modifica-soluzione/{soluzioneID}', 'AdminController@updateSoluzione')->name('admin.soluzione.update');       
    Route::delete('prod/{prodottoID}/malfunzionamento/{malfunzionamentoID}/elimina-soluzione/{soluzioneID}', 'AdminController@deleteSoluzione')->name('admin.soluzione.delete');       
    Route::delete('prod/{prodottoID}/malfunzionamento/{malfunzionamentoID}/elimina-soluzioni', 'AdminController@bulkDeleteSoluzioni')->name('admin.soluzioni.bulk-delete');       
});
