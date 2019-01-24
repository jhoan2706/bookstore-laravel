<?php

namespace Bookstore\Http\Controllers\Admin;

use Bookstore\Http\Controllers\Controller;
use Bookstore\Http\Requests\StoreBookRequest;
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

            $libros = Libro::with('categoria_libro')
                ->orderBy('id', 'DESC')
                ->titulo($titulo)
                ->categoria($categoria_id)
                ->precio($precio1, $precio2)
                ->fecha($fecha)
                ->paginate(6);

            return $libros;
        }
        return view('admin.libros.index');

    }
    public function load_categories()
    {
        $categories = DB::table('categoria_libros')->select('id', 'descripcion')->get();
        return $categories;
    }

    public function load_editions()
    {
        $editions = DB::table('ediciones')->select('nombre')->get();
        return $editions;
    }
    public function validateBook($isbn)
    {
        $libro = DB::table('libros')->select('ISBN')->where('ISBN', $isbn)->get();        
        if (empty($libro[0])) {
            return true;
        }
        return false;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = $this->load_categories();
        $ediciones = $this->load_editions();
        return view('admin.libros.create', compact('libro', 'categories', 'ediciones'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBookRequest $request)
    {
        $libro = new Libro();
        $libro->fill($request->all());
        $libro->status = $request->status == "on" ? true : false;
        if ($request->hasFile('foto_dir')) {
            $image = $request->file('foto_dir');
            $name = time() . $image->getClientOriginalName();
            $image->move(public_path() . '/images/books/', $name);
            $libro->foto_dir = $name;
        }
        if ($this->validateBook($request->ISBN)) {
            if ($libro->save()) {
                return redirect()->route('libros.index')->with('status', 'Libro guardado satisfactoriamente');
            }
        }
        return redirect()->route('libros.index')->with('danger', 'El libro no pudo ser guardado, por favor verifique.');
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
        return view('admin.libros.view', compact('libro'));

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
        $categories = $this->load_categories();
        $ediciones = $this->load_editions();
        return view('admin.libros.edit', compact('libro', 'categories', 'ediciones'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreBookRequest $request, $id)
    {
        $libro = Libro::find($id);
        $libro->fill($request->all());
        $libro->status = $request->status == "on" ? true : false;
        if ($request->hasFile('foto_dir')) {
            $image = $request->file('foto_dir');
            $name = time() . $image->getClientOriginalName();
            $image->move(public_path() . '/images/books/', $name);
            $libro->foto_dir = $name;
        }
        if ($this->validateBook($request->ISBN)) {
            if ($libro->save()) {
                return redirect()->route('libros.index')->with('status', 'Libro actualizado satisfactoriamente');
            }
        }
        return redirect()->route('libros.index')->with('danger', 'El libro no pudo ser actualizado, por favor verifique.');

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
        /* return redirect()->route('libros.index')->with('success', 'Registro eliminado satisfactoriamente'); */
    }

}
