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

//Route::resource('trainers', 'TrainerController');
/*
Podemos continuar añadiendo rutas a este grupo, y todas ellas:
Estarán validadas por el middlware admin.
Tendrán como prefijo /admin.
Sus controladores respectivos se encontrarán ubicados en App\Http\Controllers\Admin. */
Route::group([
    'middleware' => 'admin',
    'prefix' => 'admin',
    'namespace' => 'Admin',
], function () {
    Route::get('/libros/load_categories', 'LibroController@load_categories');    
    Route::resource('/admin', 'AdminController');
    Route::resource('/autores', 'AutorController');
    Route::resource('/libros', 'LibroController');
});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
//Route::resource('pokemons', 'PokemonController');
