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
        <a class="dropdown-item" href="#">Agregar</a>
      </div>
    </div>
  </div>

</div>
<hr>
<div class="row">
  {{-- filtros del catalogo --}}
  <div class="col-12 col-md-3 mb-3">
    <h5>Filtros de busqueda</h5>
    <form method="GET" action="/admin/libros" id="FormFilter">
      {{csrf_field()}}
      <div class="form-group">
        {{-- <label for="book_name">Libro</label> --}}
        <input type="text" name="book_name" class="form-control form-control-sm" id="book_name" placeholder="Título" value="{{ request()->input('book_name') }}">
      </div>
      <div class="form-group">
        {{-- <label for="book_autor">Autor</label> --}}
        <input type="text" name="book_autor" class="form-control form-control-sm" id="book_autor" placeholder="Autor">
      </div>
      <div class="form-group">
        <label for="book_category">Categoría</label>
        <select class="form-control form-control-sm" name="book_category" id="book_category">
                  <option value="{{ request()->input('book_category') }}" selected>Seleccionar</option>
                  @foreach ($categorias as $categoria)
                    <option value="{{$categoria->id}}">{{$categoria->descripcion}}</option>
                  @endforeach
                </select>
      </div>

      <div class="form-group">
        <label for="book_price">Precio</label>
        <input type="text" name="book_price1" id="book_price" class="form-control form-control-sm mb-1" placeholder="" value="{{ request()->input('book_price1') }}"
          style="width:150px;">
        <input type="text" class="form-control form-control-sm" name="book_price2" id="" placeholder="999.999" style="width:150px;"
          value="{{ request()->input('book_price2') }}">
      </div>

      <div class="form-group">
        <label for="book_year">Año publicación</label>
        <input type="text" class="form-control form-control-sm" name="book_year" id="book_year" placeholder="1978" value="{{ request()->input('book_year') }}">
      </div>
      <button type="submit" name="btnBuscar" class="btn btn-primary btn-sm">Aplicar Filtros</button>
      <button type="submit" title="Limpiar Filtros" name="btnReset" id="clear_form" class="btn btn-info"><i class="fas fa-sync-alt"></i></button>
    </form>
    @if ($errors->any())
    <div class="alert alert-danger mt-2">
      <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
    @endif
  </div>
  {{-- libros paginados --}}
  <div class="col-12 col-md-9">
    @if (count($libros)==0)
    <h6>No se encontraron resultados</h6>
    @else @foreach($libros->chunk(3) as $chunk)
    <div class="row">
      @foreach($chunk as $libro)
      <div class="col-md-4 col-sm-6 col-12">
        <figure class="card card-product">
          <div class="img-wrap"><img src="{{$libro->foto_dir}}" height="250"></div>
          <figcaption class="info-wrap">
            <h4 class="title">{{$libro->nombre}}</h4>
            <p class="desc"><b>Categoria </b><small>{{$libro->categoria_libro->descripcion}}</small></p>
            <div class="rating-wrap">
              <ul class="rating-stars">
                <li style="width:80%" class="stars-active">
                  <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                </li>
                <li>
                  <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                </li>
              </ul>
              <div class="label-rating">132 reviews</div>
              <div class="label-rating">154 orders </div>
            </div>
            <!-- rating-wrap.// -->
          </figcaption>
          <div class="bottom-wrap">

            <a href="" class="btn btn-sm btn-primary float-right" title="Añadir al carrito"><i class="fas fa-cart-plus"></i></a>
            <a href="" class="btn btn-sm btn-info float-right mr-1" title="Ver Detalle"><i class="fas fa-info-circle"></i></a>
            <div class="price-wrap h5">
              <span class="price-new">{{"$".$libro->precio}}</span> <del class="price-old">$1980</del>
            </div>
            <!-- price-wrap.// -->
          </div>
          <!-- bottom-wrap.// -->
        </figure>
      </div>
      @endforeach
    </div>
    @endforeach @endif

  </div>
</div>

<nav>
  <ul class="pagination justify-content-end">
    {{-- {{$libros->links('vendor.pagination.bootstrap-4')}} --}} {{$libros->appends(request()->input())->links('vendor.pagination.bootstrap-4')}}
  </ul>
</nav>
@endsection

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

</script>