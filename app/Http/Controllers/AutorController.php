<?php

namespace Prueba\Http\Controllers;

use Illuminate\Http\Request;
use Prueba\Autor;
use Prueba\Http\Requests\StoreAutorRequest;
use Prueba\Pais;

class AutorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {$request->user()->authorizeRoles(['admin', 'user']);

        $nombre = $request->input('nombre');
        $apellido = $request->input('apellido');
        $pais = trim($request->input('pais'));
        $pais_query = Pais::where("nombre", "LIKE", "$pais%")->pluck('id');

        $autores = Autor::orderBy('id', 'DESC')
            ->nombre($nombre)
            ->apellido($apellido)
            ->pais($pais_query)
            ->paginate(5)->appends(['nombre' => $nombre, 'apellido' => $apellido, 'pais' => $pais]); //appends me ayuda a que cuando se filtre, se mantenga el paginado al pasar de pagina
        return view('autores.index', compact('autores'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $paises = Pais::all();
        return view('autores.create', ['paises' => $paises]);

    }

    // public function api(Request $request){
    //     if ($request->ajax()) {
    //         # code...
    //     }
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAutorRequest $request)
    {
        if ($request->hasFile('foto_dir')) {
            $file = $request->file('foto_dir');
            $name = time() . $file->getClientOriginalName();
            $file->move(public_path() . '/images/autores/', $name);
        }
        $autor = new Autor;
        $autor->nombre = $request->input('nombre');
        $autor->apellido = $request->input('apellido');
        $autor->fecha_nacimiento = $request->input('fecha_nacimiento');
        $autor->foto_dir = $name;
        $autor->pais_id = $request->input('pais_id');
        $autor->save();

        return redirect()->route('autores.index')->with('status', 'Autor creado correctamente.');
        //return $request;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return $id;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
