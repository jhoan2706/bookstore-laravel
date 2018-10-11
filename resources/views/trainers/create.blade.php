@extends('layouts.app')
@section('title','Trainers Create')
@section('content')
<div class="row">
    <div class="col">
        <form action="/trainers" method="POST" class="form-group">
             {{ csrf_field() }}
            <div class="form-group">
                <label for="">Nombre</label>
                <input type="text" name="name" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Guardar</button> 
        </form>

    </div>
</div>
@endsection
