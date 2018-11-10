<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
 */

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('autors', 'AutorController@autors');
Route::get('autor/{id}', 'AutorController@autor');
Route::post('autor', 'AutorController@storeAutor');
Route::put('autor', 'AutorController@storeAutor');
Route::delete('autor/{id}', 'AutorController@destroyAutor');
