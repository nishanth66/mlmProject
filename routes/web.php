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

Route::get('/', function () {
    return view('auth.login');
});


Auth::routes();

Route::get('/home', 'HomeController@index');
Route::get('/checkReferal/{id}', 'home1Conroller@checkReferal');
Route::get('/checkEmail/{id}', 'home1Conroller@checkEmail');
Route::get('/getCity/{id}', 'home1Conroller@getCity');
Route::get('/getCity2/{id}', 'home1Conroller@getCity');

Route::resource('pins', 'pinController');