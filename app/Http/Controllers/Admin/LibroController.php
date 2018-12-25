<?php

namespace Bookstore\Http\Controllers\Admin;

use Bookstore\Http\Controllers\Controller;
use Bookstore\Libro;
use Bookstore\CategoriaLibro;
use Illuminate\Http\Request;

class LibroController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //listar los libros de la categoria Arte

        /* $categoria = CategoriaLibro::where('descripcion','Arte')->get();
        $libros_categoria=CategoriaLibro::find($categoria[0]->id)->libros;
        return $libros_categoria; */
        
        /* if ($request->ajax()) {
            $libros = Libro::with('categoria_libro')->paginate(8);
            return [
                'pagination' => [
                    'total' => $libros->total(),
                    'per_page' => $libros->perPage(),
                    'current_page' => $libros->currentPage(),
                    'last_page' => $libros->lastPage(),
                    'from' => $libros->firstItem(),
                    'to' => $libros->lastItem(),
                ],
                'libros' => $libros,
            ];
            //return response()->json($response);
        } */
        $this->validate($request, [
            'book_name' => 'nullable|string|max:200',
            'book_price1' => 'nullable|numeric',
            'book_price2' => 'nullable|numeric',
            'book_year' => 'nullable|numeric'
           ]);
        $titulo=$request->input('book_name');
        $categoria_id=$request->input('book_category');
        $precio1=$request->input('book_price1');
        $precio2=$request->input('book_price2');
        $fecha=$request->input('book_year');

        

        //$libros = Libro::with('categoria_libro')->paginate(8);
        $libros=Libro::orderBy('id','DESC')
        ->titulo($titulo)
        ->categoria($categoria_id)
        ->precio($precio1,$precio2)
        ->fecha($fecha)
        ->paginate(8);
        $categorias=CategoriaLibro::all();
        return view('admin.libros.index',compact('libros','categorias'));

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
