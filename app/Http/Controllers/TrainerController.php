<?php

namespace Prueba\Http\Controllers;

use Prueba\Trainer;
use Illuminate\Http\Request;

class TrainerController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $trainers = Trainer::all(); //consulta todos los trainer
//        $id=$trainers[0]->id;
//        $nombre=$trainers[0]->name;
        return view('trainers.index', compact('trainers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('trainers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        //el manejo de la excepcion para validar datos y sus propiedades de validacion
        $validatedData=$request->validate([
            'name'=>'required|max:10',
            'avatar'=>'required|image',
            'slug'=>'required']);
        
        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar'); //trata la img con laravel file
            $name = time() . $file->getClientOriginalName(); //get the name of the file
            $file->move(public_path() . '/images/', $name);
            //return $name;
        }
        $trainer = new Trainer;
        $trainer->name = $request->input('name');
        $trainer->slug=$request->input('slug');
        $trainer->avatar = $name;
        $trainer->save();
        //return "Saved";
        return redirect('trainers')->with('success', 'Entrenador guardado correctamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //implicit binding (Trainer $trainer)
    //slug( en bd)---->para que la url se vea bonita y no con ids
    public function show(Trainer $trainer) {
        //$trainer= Trainer::where('slug','=',$slug)->firstOrFail();
        //$trainer= Trainer::find($id);

        return view('trainers.show', compact('trainer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Trainer $trainer) {
        return view('trainers.edit', compact('trainer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Trainer $trainer) {
        $trainer->fill($request->except('avatar')); //llena todos los campos
        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar'); //trata la img con laravel file
            $name = time() . $file->getClientOriginalName(); //get the name of the file
            $trainer->avatar=$name;
            $file->move(public_path() . '/images/', $name);
            //return $name;
        }
        $trainer->save();
        return redirect('trainers')->with('status', 'Trainer updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        //
    }

}
