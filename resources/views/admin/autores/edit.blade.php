@extends('layouts.app') 
@section('title','Crear Autores') 
@section('content')
<div class="row">
    <div class="col-12">
    @include('common.errors')
        <h2>Editar Autor</h2>
        <form class="" action="{{route('autores.update',$autor->id)}}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <input type="hidden" name="_method" value="PATCH">
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" class="form-control" name="nombre" id="" placeholder="" value="{{$autor->nombre}}">
                <!--<p class="help-block">Help text here.</p>-->
            </div>
            <div class="form-group">
                <label for="apellido">Apellido</label>
                <input type="text" class="form-control" name="apellido" id="" placeholder="" value="{{$autor->apellido}}">
            </div>
            <div class="form-group">
                <label for="fecha_nacimiento">Fecha Nacimiento</label>
                <input type="date" class="form-control" name="fecha_nacimiento" id="" placeholder="" value="{{$autor->fecha_nacimiento}}">
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="inputGroupSelect01">Paises</label>
                </div>
                <select class="custom-select" name="pais_id" id="inputGroupSelect01">
                <option selected value="{{$autor->pais->id}}">{{$autor->pais->nombre}}</option>
                    @foreach($paises as $pais)                    
                    <option value="{{$pais->id}}">{{$pais->nombre}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="foto_dir">Foto</label>
                <input type="file" name="foto_dir">
            </div>
            <button type="submit" class="btn btn-dark mt-2">Guardar</button>
        </form>
        <div class="btn-group">
            <a href="{{route('autores.index')}}" class="btn btn-dark mt-2">Volver</a>
        </div>
    </div>
</div>
@endsection