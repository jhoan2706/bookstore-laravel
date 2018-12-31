<?php

namespace Bookstore\Http\Controllers\Admin;

use Bookstore\Http\Controllers\Controller;
use Bookstore\Libro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LibroController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $titulo = $request->input('book_name');
            $categoria_id = $request->input('book_category');
            $precio1 = $request->input('book_price1');
            $precio2 = $request->input('book_price2');
            $fecha = $request->input('book_year');

            $libros = Libro::with(array('categoria_libro' => function ($query) {
                $query->orderBy('id', 'DESC');
            }))->titulo($titulo)
                ->categoria($categoria_id)
                ->precio($precio1, $precio2)
                ->fecha($fecha)
                ->paginate(6);

            /* $libros = Libro::orderBy('id', 'DESC')
                ->titulo($titulo)
                ->categoria($categoria_id)
                ->precio($precio1, $precio2)
                ->fecha($fecha)
                ->paginate(6); */

            return $libros;
        }
        return view('admin.libros.index');

        //$libros = Libro::with('categoria_libro')->paginate(8);

    }
    public function load_categories()
    {
        $users = DB::table('categoria_libros')->select('id', 'descripcion')->get();
        return $users;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.libros.create');
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
        return view('admin.libros.show', compact('libro'));
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
        return view('admin.libros.edit', compact('libro'));
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
