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

Route::get('/','PublicController@viewHomePage')->name('home');

Route::get('/catalogo','PublicController@viewCatalogoPage')->name('catalogo');

Route::get('/centri-assistenza','PublicController@viewCentriAssistenzaPage')->name('centri-assistenza');

Route::view('/legali','pages.static.legali')->name('legali');

Route::view('/azienda','pages.static.about')->name('about');

//Rotte dedicate agli utenti

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login-form');

Route::post('login','Auth\LoginController@login')->name('user-login');

Route::post('logout', 'Auth\LoginController@logout')->name('user-logout');

Route::get('/inserisciUtente', 'AdminController@insertUtente')->name('insertUtente');

Route::post('/inserisciUtente', 'AdminController@saveUtente')->name('insertUtente.store');

//Rotte dedicate alle FAQ

Route::get('/faq','PublicController@viewFaqPage')->name('faq');

Route::get('/faq/insert', 'AdminController@insertFAQ')->name('insertFAQ');

Route::get('/faq/insert', 'AdminController@saveFAQ')->name('insertFAQ.store');