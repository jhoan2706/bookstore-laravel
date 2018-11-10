@extends('layouts.app') 
@section('content')
<div class="row">
  @if($libros->count()) @foreach($libros as $libro)
  <div class="col-md-4 mt-1 mb-1">
    <div class="card" >
      <img class="card-img-top" src="//placeimg.com/280/180/tech" alt="Card image cap">
      <div class="card-body">
        <h5 class="card-title">{{$libro->nombre}}</h5>
        {{--
        <p class="card-text">{{$libro->resumen}}</p> --}}
      </div>
      <ul class="list-group list-group-flush">
        <li class="list-group-item">Número Páginas:{{$libro->n_paginas}}</li>
        <li class="list-group-item">Fecha Publicación:{{$libro->fecha_publicacion}}</li>
        <li class="list-group-item">Precio:{{$libro->precio." $"}}</li>
        <li class="list-group-item">Categoría:{{$libro->categoria_libro->descripcion}}</li>
      </ul>
      <div class="card-body">
        <a href="#" class="btn btn-sm btn-info float-right">Read more <i class="fas fa-angle-double-right"></i></a>
      </div>
    </div>
  </div>
  @endforeach @else
  <h3>No hay registro !!</h3>
  @endif
</div>
<div class="row">
  <div class="col-12">
    <nav>
      <ul class="pagination justify-content-end">
        {{$libros->links('vendor.pagination.bootstrap-4')}}
      </ul>
    </nav>
  </div>
</div>
{{--
<section class="content">
  <div class="col-md-8 col-md-offset-2">
    <div class="panel panel-default">
      <div class="panel-body">
        <div class="pull-left">
          <h3>Lista Libros</h3>
        </div>
        <div class="pull-right">
          <div class="btn-group">
            <a href="#" class="btn btn-info">Añadir Libro</a>
          </div>
        </div>
        <div class="table-container">
          <table id="mytable" class="table table-bordred table-striped">
            <thead>
              <th>Nombre</th>
              <th>Resumen</th>
              <th>No. Páginas</th>
              <th>Edicion</th>
              <th>Autor</th>
              <th>Precio</th>
              <th>Editar</th>
              <th>Eliminar</th>
            </thead>
            <tbody>
              @if($libros->count()) @foreach($libros as $libro)
              <tr>
                <td>{{$libro->nombre}}</td>
                <td>{{$libro->resumen}}</td>
                <td>{{$libro->n_paginas}}</td>
                <td>{{$libro->fecha_publicacion}}</td>
                <td>{{$libro->precio}}</td>
                <td>{{$libro->categoria_libro->descripcion}}</td>
                <td><a class="btn btn-primary btn-xs" href="{{action('LibroController@edit', $libro->id)}}"><span class="glyphicon glyphicon-pencil"></span></a></td>
                <td>
                  <form action="{{action('LibroController@destroy', $libro->id)}}" method="post">
                    {{csrf_field()}}
                    <input name="_method" type="hidden" value="DELETE">

                    <button class="btn btn-danger btn-xs" type="submit"><span class="glyphicon glyphicon-trash"></span></button>
                </td>
              </tr>
              @endforeach @else
              <tr>
                <td colspan="8">No hay registro !!</td>
              </tr>
              @endif
            </tbody>

          </table>
        </div>
      </div>
    </div>
  </div>
</section> --}}
@endsection