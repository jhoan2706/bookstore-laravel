@extends('layouts.app')
@section('title','Trainer Edit')
@section('content')
<div class="row">
    <div class="col-6">
        {!!Form::model($trainer,['route'=>['trainers.update',$trainer],'method'=>'PUT','files'=>true])!!}
        @include('trainers.form')
        {!!Form::submit('Actualizar',['class'=>'btn btn-primary'])!!}
        <div class="btn-group">
            <a href="/trainers/{{$trainer->slug}}" class="btn btn-info">Volver</a>
        </div>
        {!!Form::close()!!}
    </div>
</div>
@endsection
