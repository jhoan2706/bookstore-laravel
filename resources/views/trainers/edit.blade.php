@extends('layouts.app')
@section('title','Trainer Edit')
@section('content')
<div class="row">
    <div class="col">
        <form action="/trainers/{{$trainer->slug}}" method="POST" class="form-group" enctype="multipart/form-data">
            {{ method_field('PUT') }}
            {{ csrf_field() }}
            <div class="form-group">
                <label for="">Nombre</label>
                <input type="text" name="name" class="form-control" value="{{$trainer->name}}">
                <!--<img src="/images/{{$trainer->avatar}}" alt="Avatar" class="img-thumbnail mt-2" style="width: 200px;height: 200px;">-->
            </div>            
            <div class="form-group">                
                <label for="">Avatar</label>
                <input type="file" name="avatar">
            </div>
            <button type="submit" class="btn btn-primary">Actualizar</button> 
            <div class="btn-group">
                <a href="/trainers/{{$trainer->slug}}" class="btn btn-info">Volver</a>
            </div>
        </form>

    </div>
</div>
@endsection
