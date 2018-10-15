@extends('layouts.app')
@section('title','Trainers Create')
@section('content')
<div class="row">
    <div class="col-6">
         <h5 class="card-title">Create Trainer</h5>
        <!--laravel maneja excepciones para validacion, si validateData se daña se crear $errors-->
        @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                <li style="color: red;">
                    {{$error}}
                </li>
                @endforeach
            </ul>
        </div>
        @endif        
        {!! Form::open(['route'=>'trainers.store','method'=>'POST','files'=>true])!!}
        @include('trainers.form')
        {!!Form::submit('Guardar',['class'=>'btn btn-primary'])!!}
        <div class="btn-group">
            <a href="{{route('trainers.index')}}" class="btn btn-info">Volver</a>
        </div>
        {!!Form::close()!!}
    </div>
</div>

@endsection
