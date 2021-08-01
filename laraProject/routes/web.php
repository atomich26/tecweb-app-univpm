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

Route::view('/','pages.homepage')->name('homepage');

Route::view('/legali','pages.legali')->name('legali');

Route::view('/about','pages.about')->name('about');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
