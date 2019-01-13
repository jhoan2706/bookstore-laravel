@extends('layouts.app') 
@section('title',"Editar Libro") 
@section('content')
<div class="row">
    <div class="col col-md-12">
        <h2 class="title-doc">Editar Libro</h2>
    @include('common.errors')

        <form action="{{route('libros.update',$libro->id)}}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <input type="hidden" name="_method" value="PATCH">
            <div class="form-row">
                <div class="form-group col-md-9">
                    <label for>Título</label>
                    <input type="text" name="nombre" class="form-control" placeholder="Nombre Libro" value="{{$libro->nombre}}">
                </div>
                <div class="form-group col-md-3">
                    <label for>#Páginas</label>
                    <input type="number" name="n_paginas" class="form-control" placeholder="# Páginas" value="{{$libro->n_paginas}}">
                </div>
            </div>
            <div class="form-group">
                <label for>Descripción</label>
                <textarea class="form-control" name="resumen" rows="3" placeholder="Descripción del libro" value="">{{$libro->resumen}}</textarea>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">

                    <label for>Año publicación</label>
                    <input type="number" name="fecha_publicacion" class="form-control" min="1800" max="2025" value="{{$libro->fecha_publicacion}}">
                </div>
                <div class="form-group col-md-4">
                    <label for>Categoría</label>
                    <select class="form-control" name="categoria_libro_id">
                  <option value="{{$libro->categoria_libro->id}}" selected>{{$libro->categoria_libro->descripcion}}</option>
                  @foreach ($categories as $category)
                  @if ($libro->categoria_libro->id!=$category->id)
                  <option value="{{$category->id}}">{{$category->descripcion}}</option>
                  @endif                 
                  @endforeach
                  
                </select>
                </div>

                <div class="form-group col-md-4">
                    <label for>Precio</label>
                    <input type="text" name="precio" class="form-control" placeholder="$ Precio" value="{{$libro->precio}}">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for>Stock</label>
                    <input type="text" name="stock" class="form-control" placeholder="# Stock" value="{{$libro->stock}}">
                </div>
                <div class="form-group col-md-2">
                    <label for>Peso (kg)</label>
                    <input type="text" name="peso" class="form-control" placeholder="# Peso" value="{{$libro->peso}}">
                </div>
                <div class="form-group col-md-2">
                    <label for>Edición</label>
                    <select class="form-control" name="edicion">
                        <option value="{{$libro->edicion}}" selected>{{$libro->edicion}}</option>
                        @foreach ($ediciones as $edicion)
                        @if ($libro->edicion!=$edicion->nombre)
                        <option value="{{$edicion->nombre}}">{{$edicion->nombre}}</option>
                        @endif                 
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-2">
                    <label for>Formato</label>
                    <select class="form-control" name="formato">
                              <option value="{{$libro->formato}}" selected>{{$libro->formato}}</option>  
                            </select>
                </div>
                <div class="form-group col-md-2">
                    <div class="form-check">
                        <label for>Estado</label>
                        <br> @if ($libro->status)
                        <input class="form-check-input" type="checkbox" name="status" checked>
                        <label class="form-check-label" for="gridCheck">Disponible</label> @else
                        <input class="form-check-input" type="checkbox" name="status">
                        <label class="form-check-label" for="gridCheck">No Disponible</label> @endif


                    </div>
                </div>
            </div>
            <!-- <div class="custom-file">
                        <input type="file" class="custom-file-input" id="customFile">
                        <label class="custom-file-label" for="customFile">Choose file</label>
            </div>-->
            <div class="btn-group">
                <a href="/admin/libros" class="btn btn-secondary mr-2">Volver</a>
            </div>
            <button type="submit" class="btn btn-dark">Guardar</button>
        </form>
    </div>
</div>
@endsection