<?php

namespace Prueba\Http\Controllers;

use Illuminate\Http\Request;
use Prueba\Autor;
use Prueba\Http\Requests\StoreAutorRequest;
use Prueba\Http\Resources\Autor as AutorResource;
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
    //FOR API ROUTES AND API EXAMPLE
    public function storeAutor(Request $request)
    {
        $autor = $request->isMethod('put') ? Autor::findOrFail($request->autor_id) : new Autor;//check if $request->autor_id exists
        $autor->id = $request->input('autor_id');
        $autor->nombre = $request->input('nombre');
        $autor->apellido = $request->input('apellido');
        $autor->fecha_nacimiento = $request->input('fecha_nacimiento');
        $autor->pais_id = $request->input('pais_id');
        if($autor->save()) {
            return new AutorResource($autor);
        }
    }
    public function destroyAutor($id)
    {
        $autor=Autor::findOrFail($id);
        if ($autor->delete()) {
            return new AutorResource($autor);
        }
    }
    public function autors()
    {
        //$autors = Autor::paginate(10);
        $autors = Autor::with('pais')->paginate(10);
        return AutorResource::collection($autors);
    }
    public function autor($id)
    {
        $autor = Autor::findOrFail($id);
        return new AutorResource($autor);
    }
    //API END

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
        $autor = Autor::find($id);
        $pais_autor = $autor->pais->nombre;
        $paises = Pais::all()->except($autor->pais_id);
        //return $pais_autor;
        return view('autores.edit', compact('autor', 'paises', 'pais_autor'));
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
        $autor = Autor::find($id);
        $autor->fill($request->except('foto_dir'));
        $autor->pais_id = $request->input('pais_id');
        if ($request->hasFile('foto_dir')) {
            $file = $request->file('foto_dir');
            $name = time() . $file->getClientOriginalName();
            $file->move(public_path() . '/images/autores/', $name);
            $autor->foto_dir = $name;
        }
        $autor->save();
        return redirect()->route('autores.index')->with('status', 'Autor updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $autor = Autor::find($id);
        $autor->delete();
        return redirect()->route('autores.index')->with('info', 'Autor has been deleted');
    }
}
