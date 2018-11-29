@extends('layouts.app') 
@section('content')
<div class="row">
  <div class="col-4">
      <h3 class="mb-2">Catálogo de libros</h3>            
  </div>
  <div class="col-6">
      <div class="dropdown">
          <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Acciones
          </button>
          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="#">Agregar</a>            
          </div>
        </div>
  </div>
  
</div>
<hr>
<libros-component></libros-component>
@endsection