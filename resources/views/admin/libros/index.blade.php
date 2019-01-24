@extends('layouts.app') 
@section('title','Catálogo') 
@section('content')
<div class="row">
  <div class="col-4">
    <h3 class="mb-2">Catálogo de libros</h3>
  </div>
  <div class="col-6">
    <div class="dropdown">
      <button class="btn btn-outline-dark dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
        aria-expanded="false">Acciones</button>
      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
        <a href="/admin/libros/create" class="dropdown-item">
            <i class="fas fa-plus-circle"></i>Agregar
          </a>
      </div>
    </div>
    <!-- <addBookModal></addBookModal> -->
  </div>
</div>
<hr>
  @include('common.success')
<index-books></index-books>
<add-form-modal></add-form-modal>
@endsection
 {{--
<script src="{{ asset('js/vue-app.js') }}"></script> --}}