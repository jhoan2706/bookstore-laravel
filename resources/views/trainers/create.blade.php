@extends('layouts.app')
@section('title','Trainers Create')
@section('content')
<div class="row">
    <div class="col-6">
        @include('common.errors')
         <h5 class="card-title">Create Trainer</h5>       
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
