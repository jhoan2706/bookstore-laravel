@extends('layouts.app') 
@section('title','Catálogo') 
@section('content')
<div class="row">
  <div class="col-4">
    <h3 class="mb-2">Catálogo de libros</h3>
  </div>
  <div class="col-6">
    <div class="dropdown">
      <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
        aria-expanded="false">
            Acciones
          </button>
      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
        <a class="dropdown-item" href="{{route('libros.create')}}">Agregar</a>
      </div>
    </div>
  </div>

</div>
<hr>
<index-books></index-books>

{{--
<nav>
  <ul class="pagination justify-content-end">
    {{$libros->appends(request()->input())->links('vendor.pagination.bootstrap-4')}}
  </ul>
</nav> --}}
@endsection
 {{--
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script>
  $(function () {
  var buttonpressed;
  $("#clear_form").click(function() {
      buttonpressed = $(this).attr('name');
  });
  $("#FormFilter").submit(function() {
      if(buttonpressed=="btnReset"){
        $(".form-control").val("");
      }
  });
});

</script> --}}