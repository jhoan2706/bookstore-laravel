@extends('layouts.app')
@section('title','Trainers')
@section('content')
<div class="row">
    <div class="col">
        @include('common.success')
        <img class="card-img-top rounded-circle mx-auto d-block" src="/images/{{$trainer->avatar}}" alt="" style="height:200px;
             width: 200px;background-color: #EFEFEF;margin: 20px">
        <div class="text-center">
            <h5 class="card-title">
                {{$trainer->name}}
            </h5>
            <!--<h1>{{$trainer->slug}}</h1>-->
            <p class="card-text">Some quick example text to build on the card title and make 
                up the bulk of the card's content.</p>
            <!--link con ruta para editar-->
            <a href="/trainers/{{$trainer->slug}}/edit" class="btn btn-primary">Editar</a>
            <!--miniformulario para eliminar el trainer-->
            {!!Form::open(['route'=>['trainers.destroy',$trainer->slug],'method'=>'DELETE'])!!}
                {!!Form::submit('Eliminar',['class'=>'btn btn-danger mt-2'])!!}
            {!!Form::close()!!}
        </div>
    </div>

</div>
<div class="btn-group mb-2">
    <a href="{{route('trainers.index')}}" class="btn btn-info">volver</a>
</div>
@endsection
