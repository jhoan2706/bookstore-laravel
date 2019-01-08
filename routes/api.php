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
Route::get('autors', 'Admin\AutorController@autors');
Route::get('autor/{id}', 'Admin\AutorController@autor');
Route::post('autor', 'Admin\AutorController@storeAutor');
Route::put('autor', 'Admin\AutorController@storeAutor');
Route::delete('autor/{id}', 'Admin\AutorController@destroyAutor');
