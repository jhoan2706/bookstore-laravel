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
Route::get('/name/{name}/lastname/{last_name?}',function($name,$last_name=null){
    return "Hola ".$name." ".$last_name;
});

//Para el TRainerCOntroller resource
Route::resource('trainers','TrainerController');

Route::resource('libro','LibroController');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
