@extends('layouts.app')
@section('title','Trainers Create')
@section('content')
<h2 class="">Trainers</h2>
<div class="btn-group">
    <a href="{{route('trainers.create')}}" class="btn btn-primary">Crear nuevo</a>
</div>
@include('common.success')
<div class="row">
    
    @foreach($trainers as $trainer)

    <div class="col-sm mt-2">
        <div class="card text-center" style="width: 18rem;">
            <img class="card-img-top rounded-circle mx-auto d-block" src="images/{{$trainer->avatar}}" alt="" style="height:100px;width: 100px;background-color: #EFEFEF;margin: 20px">
            <div class="card-body">
                <h5 class="card-title">{{$trainer->name}}</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="/trainers/{{$trainer->slug}}" class="btn btn-primary">Ver más</a>
            </div>
        </div>  
    </div>


    @endforeach
</div>
@endsection
