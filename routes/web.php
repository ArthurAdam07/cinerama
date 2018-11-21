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
    return view('welcome');
});
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/filmes', 'filmesController@index');

Route::group(['middleware' => 'auth'], function(){
	Route::get('/filmes/create', 'filmesController@create');
	Route::post('/filmes', 'filmesController@store');
	Route::get('/filmes/{id}', 'filmesController@show');
	Route::get('/filmes/{id}/edit', 'filmesController@edit');
	Route::put('/filmes/{id}', 'filmesController@update');
	Route::get('/filmes/{id}/delete', 'filmesController@delete');
	Route::delete('/filmes/{id}', 'filmesController@destroy');
});
