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
//Route::get('/User','UserController@index');
//redireccionamiento
//Route::redirect('/here', '/there', 301);

//Nombres para rutas
//Route::get('user/profile', 'UserController@showProfile')->name('profile');

//Parametro por default
/* Route::get('/name/{name}/lastname/{last_name?}', function ($name, $last_name = null) {
return "Hola " . $name . " " . $last_name;
}); */

//Para el TRainerCOntroller resource
Route::resource('trainers', 'TrainerController');

//Rutas del admin
/* Route::group(['middleware' => 'admin'], function () {
    Route::resource('/admin/admin', 'Admin\AdminController');
    Route::resource('/admin/autores', 'Admin\AutorController');
    Route::resource('/admin/libros', 'Admin\LibroController');
}); */

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
    Route::resource('/admin', 'AdminController');
    Route::resource('/autores', 'AutorController');
    Route::resource('/libros', 'LibroController');
});

Auth::routes();
//
Route::get('/home', 'HomeController@index')->name('home');
Route::resource('pokemons', 'PokemonController');
