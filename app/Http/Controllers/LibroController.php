<?php

namespace Bookstore\Http\Controllers;

use Illuminate\Http\Request;
use Bookstore\Libro;
use Bookstore\CategoriaLibro;

class LibroController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //listar los libros de la categoria Arte

        /* $categoria = CategoriaLibro::where('descripcion','Arte')->get();
        $libros_categoria=CategoriaLibro::find($categoria[0]->id)->libros;
        return $libros_categoria; */

        $libros=Libro::paginate(6);
        return view('libros.index',compact('libros'));
        /* foreach ($libros as $libro) {
            echo "Nombre Libro: ".$libro->nombre."------";
            echo "Categoria Libro: ".$libro->categoria_libro->descripcion;
            echo "<br>";
        } */
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('libros.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, ['nombre' => 'required', 'resumen' => 'required', 'npagina' => 'required', 'edicion' => 'required', 'autor' => 'required', 'npagina' => 'required', 'precio' => 'required']);
        Libro::create($request->all());
        return redirect()->route('libros.index')->with('success', 'Registro creado satisfactoriamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $libro = Libro::find($id);
        return view('libros.show', compact('libro'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $libro = Libro::find($id);
        return view('libros.edit', compact('libro'));
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
        $this->validate($request, ['nombre' => 'required', 'resumen' => 'required', 'npagina' => 'required', 'edicion' => 'required', 'autor' => 'required', 'npagina' => 'required', 'precio' => 'required']);
        Libro::find($id)->update($request->all());
        return redirect()->route('libros.index')->with('success', 'Registro actualizado satisfactoriamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Libro::find($id)->delete();
        return redirect()->route('libros.index')->with('success', 'Registro eliminado satisfactoriamente');
    }

}
