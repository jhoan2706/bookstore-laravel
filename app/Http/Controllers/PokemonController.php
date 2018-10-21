<?php

namespace Prueba\Http\Controllers;

use Illuminate\Http\Request;
use Prueba\Pokemon;

class PokemonController extends Controller
{
  //microservicio expuesto por laravel
    public function index(Request $request){
      if ($request->ajax()) {
        //datos que se envian a vue axios
        $pokemons=Pokemon::all();
        return response()->json($pokemons,200);
      }
      return view('pokemons.index');//se carga la vista de igual forma con return
    }
    public function store(Request $request){
        //vuejs trabaja con ajax
      if ($request->ajax()) {
        
        $pokemon=new Pokemon();
        $pokemon->name=$request->input('name');
        $pokemon->picture=$request->input('picture');
        $pokemon->save();
        //retornar respuesta http lo indica con tipo de recurso
        return response()->json([
          'message'=>'Pokemon created successfully',
          'pokemon'=>$pokemon
        ],200);
      }
    }
}
