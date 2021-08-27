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

//Rotte dedicate agli utenti
Route::view('/profilo','users.user-profile')->name('user-profile')->middleware('can:hasProfilePage');

// Rotte per l'autenticazione
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login-form');

Route::post('login','Auth\LoginController@login')->name('user-login');

Route::post('logout', 'Auth\LoginController@logout')->name('user-logout');

Route::get('/inserisciUtente', 'AdminController@insertUtente')->name('insertUtente');

Route::post('/inserisciUtente', 'AdminController@saveUtente')->name('insertUtente.store');

//Rotte dedicate alle FAQ

Route::get('/faq','PublicController@viewFaqPage')->name('faq');

Route::get('/faq/insert', 'AdminController@insertFAQ')->name('insertFAQ');

Route::post('/faq/insert', 'AdminController@saveFAQ')->name('insertFAQ.store');

Route::get('/faq/{faqId}/modify', 'AdminController@modifyFAQ')->name('modifyFAQ');

Route::put('/faq/{faqId}/modify', 'AdminController@updateFAQ')->name('modifyFAQ.update');

Route::delete('/faq/{faqId}', 'AdminController@deleteFAQ')->name('deleteFAQ');
