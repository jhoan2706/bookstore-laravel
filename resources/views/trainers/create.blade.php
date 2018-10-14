@extends('layouts.app')
@section('title','Trainers Create')
@section('content')
<div class="row">
    <div class="col">
        <form action="/trainers" method="POST" class="form-group" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="">Nombre</label>
                <input type="text" name="name" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Avatar</label>
                <input type="file" name="avatar">
            </div>
            <button type="submit" class="btn btn-primary">Guardar</button> 
            <div class="btn-group">
                <a href="{{route('trainers.index')}}" class="btn btn-info">Volver</a>
            </div>
        </form>

    </div>
</div>

@endsection
