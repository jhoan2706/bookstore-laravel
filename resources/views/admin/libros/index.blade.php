@extends('layouts.app') 
@section('title','Catálogo') 
@section('content')
<div class="row">
  <div class="col-4">
    <h3 class="mb-2">Catálogo de libros</h3>
  </div>
  <btn-add-book></btn-add-book>
</div>
<hr>
<index-books></index-books>
<add-form-modal></add-form-modal>

@endsection
{{-- <script src="{{ asset('js/vue-app.js') }}"></script> --}}
