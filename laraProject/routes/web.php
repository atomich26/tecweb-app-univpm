<?php

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

Route::get('/', function(){
    return redirect()->route('catalogo');
});
Route::get('/catalogo','PublicController@viewCatalogoPage')->name('catalogo');

Route::get('/centri-assistenza','PublicController@viewCentriAssistenzaPage')->name('centri-assistenza');

Route::view('/legali','pages.static.legali')->name('legali');

Route::get('/faq','PublicController@viewFaqPage')->name('faq');

Route::get('/catalogo/{prodottoID}', 'PublicController@viewProdottoPage')->name('prodotto');

// Rotte pagine statiche
Route::view('/chi-siamo','public.static.chi-siamo')->name('chi-siamo');

Route::view('/informativa-privacy','public.static.privacy')->name('privacy');

// Rotte dedicate agli utenti
Route::get('/profilo','UserController@index')->name('user.profile');

// Rotte per l'autenticazione
Route::redirect('accedi', 'login', 302);

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login-form');

Route::post('login','Auth\LoginController@login')->name('user-login');

Route::post('logout', 'Auth\LoginController@logout')->name('user-logout');

Route::prefix('admin')->group(function () {

    Route::middleware('can:isAdmin')->group(function(){

        Route::get('dashboard', 'AdminController@index')->name('admin.index');

        //Rotte CRUD per i prodotti
        Route::get('gestione-prodotti', 'AdminController@viewProdottiTable')->name('prodotti.table');

        Route::get('nuovo-prodotto', 'AdminController@insertProdotto')->name('prodotto.new');

        Route::post('inserisci-prodotto', 'AdminController@storeProdotto')->name('prodotto.store');

        Route::get('modifica-prodotto/{productID}', 'AdminController@modifyProdotto')->name('prodotto.modify');

        Route::put('aggiorna-prodotto/{productID}', 'AdminController@updateProdotto')->name('prodotto.update');

        Route::delete('elimina-prodotto/{productID}', 'AdminController@deleteProdotto')->name('prodotto.delete');

        //Rotte CRUD per le FAQ
        Route::get('gestione-faq', 'AdminController@viewFaqTable')->name('faq.table');

        Route::get('nuova-faq', 'AdminController@insertFAQ')->name('faq.new');

        Route::post('inserisci-faq', 'AdminController@storeFAQ')->name('faq.store');

        Route::get('modifica-faq/{faqID}', 'AdminController@modifyFAQ')->name('faq.modify');

        Route::put('modifica-faq/{faqID}', 'AdminController@updateFAQ')->name('faq.update');

        Route::delete('elimina-faq/{faqID}', 'AdminController@deleteFAQ')->name('faq.delete');

        //Rotte CRUD per gli utenti
        Route::get('gestione-utenti', 'AdminController@viewUtentiTable')->name('utenti.table');

        Route::get('nuovo-utente', 'AdminController@insertUtente')->name('utente.new');

        Route::post('inserisci-utente', 'AdminController@saveUtente')->name('utente.store');

        Route::get('modifica-utente/{utenteID}', 'AdminController@modifyUtente')->name('utente.modify');

        Route::put('modifica-utente/{utenteID}', 'AdminController@updateUtente')->name('utente.update');

        Route::get('elimina-utente/{utenteID}', 'AdminController@deleteUtente')->name('utente.delete');

        Route::delete('user/{userID}', 'AdminController@deleteUtente')->name('deleteUtente');

        //Rotte CRUD per i centri assistenza
        Route::get('gestione-centri-assistenza', 'AdminController@showCentriAssistenzaTable')->name('centri.table');

        Route::get('centri-assistenza/nuovo-centro', 'AdminController@insertCentro')->name('centro.new');

        Route::post('/centri-assistenza/inserisciCentro', 'AdminController@saveCentro')->name('insertCentro.store');

        Route::post('centri-assistenza/inserisci-centro', 'AdminController@saveCentro')->name('centro.store');

        Route::get('centri-assistenza/modifica-centro/{centroID}','AdminController@modifyCentro')->name('centro.modify');

        Route::put('centri-assistenza/modifica-centro/{centroID}','AdminController@updateCentro')->name('centro.update');

        Route::delete('/centri-assistenza/{centerID}', 'AdminController@deleteCentro')->name('deleteCentro');

    });

   /* Route::middleware('can:editMalfunzionamenti, productID')->group(function(){

        Route::get('/catalogo/{productID}/inserisciMalfunzionamento', 'AdminController@insertMalfunzionamento')->name('insertMalfunzionamento');

        Route::post('/catalogo/{productID}/inserisciMalfunzionamento', 'AdminController@saveMalfunzionamento')->name('insertMalfunzionamento.store');

        Route::get('/catalogo/{productID}/malfunzionamento/{malfunzionamentoID}/modify', 'AdminController@modifyMalfunzionamento')->name('modifyMalfunzionamento');

        Route::put('/catalogo/{productID}/malfunzionamento/{malfunzionamentoID}/modify', 'AdminController@updateMalfunzionamento')->name('modifyMalfunzionamento.update');

        Route::delete('/catalogo/{productID}/malfunzionamento/{malfunzionamentoID}', 'AdminController@deleteMalfunzionamento')->name('deleteMalfunzionamento');
        */
    Route::middleware('can:isAdmin', 'can:editMalfunzionamenti')->group(function(){
        //Rotte CRUD malfunzionamenti e soluzioni
        Route::get('prova', function(){
            redirect('catalogo');
        });
    });
});
