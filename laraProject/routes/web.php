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

// Rotte al PublicController
Route::get('/','PublicController@viewHomePage')->name('home');

Route::get('/catalogo','PublicController@viewCatalogoPage')->name('catalogo');

Route::get('/centri-assistenza','PublicController@viewCentriAssistenzaPage')->name('centri-assistenza');

Route::get('/faq','PublicController@viewFaqPage')->name('faq');

// Rotte pagine statiche
Route::view('/lavora-con-noi','pages.static.lavora-con-noi')->name('lavora-con-noi');

Route::view('/chi-siamo','pages.static.chi-siamo')->name('chi-siamo');

Route::view('/informativa-privacy','pages.static.privacy')->name('privacy');

// Rotte per l'autenticazione
Route::get('accedi', 'Auth\LoginController@showLoginForm')->name('login-form');

Route::post('accedi','Auth\LoginController@login')->name('user-login');

Route::post('logout', 'Auth\LoginController@logout')->name('user-logout');
