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

use App\Http\Controllers\ClientController;


Route::get('/', function(){
    return redirect('/client');
});

Auth::routes(['verify' => true]);

//Home Page
Route::get('/home', 'HomeController@index')->name('home');

//Client Routes
Route::get('/client', 'ClientController@index');
Route::post('/client/create', 'ClientController@store');
Route::get('/client/edit/{id}', 'ClientController@edit');
Route::put('/client/edit/{id}', 'ClientController@update');
Route::delete('/client/delete/{id}', 'ClientController@destroy');
Route::get('/client/table', 'ClientController@table');