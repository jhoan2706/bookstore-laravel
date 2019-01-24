@extends('layouts.app') 
@section('title',"Agregar Libro") 
@section('content')
<div class="row">
	<div class="col col-md-12">
		<h2 class="title-doc">Agregar Libro</h2>
	@include('common.errors')

		<form action="/admin/libros" method="post" enctype="multipart/form-data">
			{{ csrf_field() }}			
			<div class="form-row">
				<div class="form-group col-md-9">
					<label for>Título</label>
					<input type="text" name="nombre" class="form-control" placeholder="Nombre Libro">
				</div>
				<div class="form-group col-md-3">
					<label for>#Páginas</label>
					<input type="number" name="n_paginas" class="form-control" placeholder="# Páginas">
				</div>
			</div>
			<div class="form-group">
				<label for="">ISBN</label>
				<input type="text" class="form-control" name="ISBN" placeholder="ISBN">
			</div>
			<div class="form-group">
				<label for>Descripción</label>
				<textarea class="form-control" name="resumen" rows="3" placeholder="Descripción del libro"></textarea>
			</div>
			<div class="form-group">
			  <label for="">Autores</label>
			  <input type="text" class="form-control autores_items" name="" id="" aria-describedby="helpId" placeholder="Nombre autor">			  
			</div>
			<div class="form-row">
				.<div class="form-group col-md-6">
				  <label for=""></label>
				  <input type="text" name="autor" id="" class="form-control autors" placeholder="Autor">
				</div>
			</div>
			<div class="form-row">
				<div class="form-group col-md-4">

					<label for>Año publicación</label>
					<input type="number" name="fecha_publicacion" class="form-control" min="1800" max="2025">
				</div>
				<div class="form-group col-md-4">
					<label for>Categoría</label>
					<select class="form-control" name="categoria_libro_id">
                  <option value="" selected>Seleccionar</option>
                  @foreach ($categories as $category)                  
                  <option value="{{$category->id}}">{{$category->descripcion}}</option>                  
                  @endforeach
                  
                </select>
				</div>

				<div class="form-group col-md-4">
					<label for>Precio</label>
					<input type="text" name="precio" class="form-control" placeholder="$ Precio">
				</div>
			</div>
			<div class="form-row">
				<div class="form-group col-md-4">
					<label for>Stock</label>
					<input type="text" name="stock" class="form-control" placeholder="# Stock">
				</div>
				<div class="form-group col-md-2">
					<label for>Peso (kg)</label>
					<input type="text" name="peso" class="form-control" placeholder="# Peso">
				</div>
				<div class="form-group col-md-2">
					<label for>Edición</label>
					<select class="form-control" name="edicion">              
                        @foreach ($ediciones as $edicion)                        
                        <option value="{{$edicion->nombre}}">{{$edicion->nombre}}</option>                                     
                        @endforeach
                    </select>
				</div>
				<div class="form-group col-md-2">
					<label for>Formato</label>
					<select class="form-control" name="formato">
                              <option value="Libro" selected>Libro</option>  
                            </select>
				</div>
				<div class="form-group col-md-2">
					<div class="form-check">
						<label for>Estado</label>
						<br>
						<input class="form-check-input" type="checkbox" name="status" checked>
						<label class="form-check-label" for="gridCheck">Disponible</label>
					</div>
				</div>
			</div>
			<div class="form-group">
				<label for="foto_dir">Portada</label>
				<input type="file" class="form-control-file" name="foto_dir" placeholder="Seleccione una imagen">
			</div>	
			<div class="form-group">
			  <label for="">prueba datepicker</label>
			  <input type="text" class="form-control datepicker" name="" id="" placeholder="">			  
			</div>	
			<select class="js-example-basic-single" name="state">
				<option value="AL">Alabama</option>				  
				<option value="WY">Wyoming</option>
			  </select>	
			<div class="btn-group">
				<a href="/admin/libros" class="btn btn-secondary mr-2">Volver</a>
			</div>
			<button type="submit" class="btn btn-dark">Guardar</button>
		</form>
	</div>
</div>
@endsection
<script src="{{ asset('js/jquery.min.js') }}"></script>   
<script type="text/javascript">
	$(function () {
		console.log("putos");		
		$('.js-example-basic-single').select2();
	});
	
</script>


