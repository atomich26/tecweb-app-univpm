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

Route::get('/catalogo/prodotti/{modello}', 'PublicController@viewProdottoPage')->name('prodotto');

// Rotte pagine statiche
Route::view('/chi-siamo','public.static.chi-siamo')->name('chi-siamo');

Route::view('/informativa-privacy','public.static.privacy')->name('privacy');

// Rotte dedicate agli utenti
Route::view('/profilo','users.user-profile')->name('user-profile')->middleware('can:hasProfilePage');

// Rotte per l'autenticazione
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login-form');

Route::post('login','Auth\LoginController@login')->name('user-login');

Route::post('logout', 'Auth\LoginController@logout')->name('user-logout');

// Rotte dedicate alla gestione degli utenti

Route::get('/inserisciUtente', 'AdminController@insertUtente')->name('insertUtente');

Route::post('/inserisciUtente', 'AdminController@saveUtente')->name('insertUtente.store');

Route::get('/user/{userID}/modify', 'AdminController@modifyUtente')->name('modifyUtente');

Route::put('/user/{userID}/modify', 'AdminController@updateUtente')->name('modifyUtente.update');

// Rotte dedicate alle FAQ

Route::get('/faq','PublicController@viewFaqPage')->name('faq');

Route::get('/faq/insert', 'AdminController@insertFAQ')->name('insertFAQ');

Route::post('/faq/insert', 'AdminController@saveFAQ')->name('insertFAQ.store');

Route::get('/faq/{faqId}/modify', 'AdminController@modifyFAQ')->name('modifyFAQ');

Route::put('/faq/{faqId}/modify', 'AdminController@updateFAQ')->name('modifyFAQ.update');

Route::delete('/faq/{faqId}', 'AdminController@deleteFAQ')->name('deleteFAQ');

// Rotte dedicate ai prodotti

Route::get('/inserisciProdotto', 'AdminController@insertProdotto')->name('insertProdotto');

Route::post('inserisciProdotto', 'AdminController@saveProdotto')->name('insertProdotto.store');

Route::get('/prodotto/{productID}/modify', 'AdminController@modifyProdotto')->name('modifyProdotto');

Route::put('/prodotto/{productID}/modify', 'AdminController@updateProdotto')->name('modifyProdotto.update');

Route::delete('/prodotto/{productID}', 'AdminController@deleteProdotto')->name('deleteProdotto');

//rotte dedicate ai centri assistenza

Route::get('centri-assistenza/inserisciCentro', 'AdminController@insertCentro')->name('insertCentro');

Route::post('centri-assistenza/inserisciCentro', 'AdminController@saveCentro')->name('insertCentro.store');

Route::get('/centri-assistenza/{centerID}/modify','AdminController@modifyCentro')->name('modifyCentro');

Route::put('/centri-assistenza/{centerID}/modify','AdminController@updateCentro')->name('modifyCentro.update');
