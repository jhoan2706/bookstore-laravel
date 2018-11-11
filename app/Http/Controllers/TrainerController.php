<?php

namespace Bookstore\Http\Controllers;

use Bookstore\Trainer;
use Illuminate\Http\Request;
use Bookstore\Http\Requests\StoreTrainerRequest;

class TrainerController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {
        //valida con modelo user si el user está autenticado
        $request->user()->authorizeRoles(['admin','user']);
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
    public function store(StoreTrainerRequest $request) {
        //al momento de enviar el form, laravel valida la request en la Clase request creada y continua con el proceso

        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar'); //trata la img con laravel file
            $name = time() . $file->getClientOriginalName(); //get the name of the file
            $file->move(public_path() . '/images/', $name);
            //return $name;
        }
        $trainer = new Trainer;
        $trainer->name = $request->input('name');
        $trainer->slug = $request->input('slug');
        $trainer->avatar = $name;
        $trainer->save();
        //return "Saved";
        return redirect()->route('trainers.index')->with('status','Trainer created succesfully!');
        //return redirect('trainers')->with('success', 'Entrenador guardado correctamente.');
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
    public function update(StoreTrainerRequest $request, Trainer $trainer) {
        $trainer->fill($request->except('avatar')); //llena todos los campos
        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar'); //trata la img con laravel file
            $name = time() . $file->getClientOriginalName(); //get the name of the file
            $trainer->avatar = $name;
            $file->move(public_path() . '/images/', $name);
            //return $name;
        }
        $trainer->save();
        return redirect()->route('trainers.show',[$trainer])->with('status','Trainer updated successfully!');
        //return redirect('trainers')->with('status', 'Trainer updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Trainer $trainer) {
        //eliminar archivo dentro de laravel
        
        //ruta completa en variable
        $file_path= public_path().'/images/'.$trainer->avatar;
        //elimino la img con laravel
        \File::delete($file_path);
        
        $trainer->delete();
        
        //return $file_path;
        return redirect()->route('trainers.index')->with('info','Trainer deleted successfully!');
        //return redirect('trainers')->with('status', 'Trainer deleted!');
    }

}
