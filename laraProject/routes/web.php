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

Route::get('/catalogo/{modello}', 'PublicController@viewProdottoPage')->name('prodotto');

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

        //Rotte CRUD per i prodotti
        Route::get('gestisci-prodotti', 'AdminController@showProdottiTable')->name('prodotti-table');

        Route::get('nuovo-prodotto', 'AdminController@insertProdotto')->name('prodotto.new');

        Route::post('inserisci-prodotto', 'AdminController@saveProdotto')->name('prodotto.store');

        Route::get('modifica-prodotto/{productID}', 'AdminController@modifyProdotto')->name('prodotto.modify');

        Route::put('aggiorna-prodotto/{productID}', 'AdminController@updateProdotto')->name('prodotto.update');

        Route::delete('/prodotto/{productID}', 'AdminController@deleteProdotto')->name('prodotto.delete');

        //Rotte CRUD per le faq
        Route::get('gestisci-faq', 'AdminController@showFaqTable')->name('faq-table');

        Route::get('/faq','PublicController@viewFaqPage')->name('faq');

        Route::get('/faq/insert', 'AdminController@insertFAQ')->name('insertFAQ');

        Route::post('/faq/insert', 'AdminController@saveFAQ')->name('insertFAQ.store');

        Route::get('/faq/{faqId}/modify', 'AdminController@modifyFAQ')->name('modifyFAQ');

        Route::put('/faq/{faqId}/modify', 'AdminController@updateFAQ')->name('modifyFAQ.update');

        Route::delete('/faq/{faqId}', 'AdminController@deleteFAQ')->name('deleteFAQ');

        //Rotte CRUD per gli utenti
        Route::get('gestisci-utenti', 'AdminController@showProdottiTable')->name('utenti-table');

        Route::get('/inserisciUtente', 'AdminController@insertUtente')->name('insertUtente');

        Route::post('/inserisciUtente', 'AdminController@saveUtente')->name('insertUtente.store');

        Route::get('/user/{userID}/modify', 'AdminController@modifyUtente')->name('modifyUtente');

        Route::put('/user/{userID}/modify', 'AdminController@updateUtente')->name('modifyUtente.update');

        //Rotte CRUD per i centri assistenza
        Route::get('gestisci-centri-assistenza', 'AdminController@showCentriAssistenzaTable')->name('centri-assistenza-table');

        Route::get('centri-assistenza/inserisciCentro', 'AdminController@insertCentro')->name('insertCentro');

        Route::post('centri-assistenza/inserisciCentro', 'AdminController@saveCentro')->name('insertCentro.store');

        Route::get('/centri-assistenza/{centerID}/modify','AdminController@modifyCentro')->name('modifyCentro');

        Route::put('/centri-assistenza/{centerID}/modify','AdminController@updateCentro')->name('modifyCentro.update');

    });

    Route::middleware('can:editMalfunzionamenti')->group(function(){
        //Rotte CRUD malfunzionamenti e soluzioni
    });
});
