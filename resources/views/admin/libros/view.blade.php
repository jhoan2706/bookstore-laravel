@extends('layouts.app') 
@section('title','Info Libro') 
@section('content')
<div class="row">
    <div class="col-11">
        <h2 class="title-doc">Información Libro</h2>
    </div>
    <div class="col-1">
        <div class="btn-group">
            <a href="/admin/libros" class="btn btn-dark">Volver</a>
        </div>
    </div>
</div>
<div class="row">
    <div class="col">

        <div class="card mt-3">

            <div class="row no-gutters">

                <aside class="col-sm-4 border-right">
                    <article class="gallery-wrap">
                        <div class="img-big-wrap">
                            {{-- la imagen tiene que ser url --}}
                            <div><img src="/images/books/{{$libro->foto_dir}}"></div>
                        </div>
                        <!-- slider-product.// -->
                    </article>
                    <!-- gallery-wrap .end// -->
                </aside>
                <aside class="col-sm-8">
                    <a href="/admin/libros/{{$libro->id}}/edit" class="btn btn-warning float-right mr-1 mt-2" title="Editar Libro">
                            <i class="fas fa-pencil-alt"></i>
                           </a>
                    <article class="p-5">
                        <h3 class="title mb-3">{{$libro->nombre}}</h3>

                        <div class="mb-2">
                            <var class="price h3 text-warning"> 
            <span class="currency">COL $</span><span class="num">{{$libro->precio}}</span>
            </var>
                        </div>
                        <!-- price-detail-wrap .// -->                        
                        <dl class="row">
                            <dt class="col-sm-3"># Páginas</dt>
                            <dd class="col-sm-9">{{$libro->n_paginas}}</dd>

                            <dt class="col-sm-3">Estado</dt>
                            <dd class="col-sm-9">@if ($libro->status==1)
                                Disponible
                                @else
                                No Disponible
                                @endif</dd>
                            <dt class="col-sm-3">Categoría</dt>
                            <dd class="col-sm-9">{{$libro->categoria_libro->descripcion}}</dd>

                            <dt class="col-sm-3">Año publicación</dt>
                            <dd class="col-sm-9">{{$libro->fecha_publicacion}}</dd>

                            <dt class="col-sm-3">ISBN</dt>
                            <dd class="col-sm-9">{{$libro->ISBN}}</dd>
                            
                        </dl>
                        <div class="rating-wrap mb-2">

                            <ul class="rating-stars">
                                <li style="width:80%" class="stars-active">
                                    <i class="fa fa-star"></i> <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i> <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </li>
                                <li>
                                    <i class="fa fa-star"></i> <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i> <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </li>
                            </ul>
                            <div class="label-rating">132 reviews</div>
                            <div class="label-rating">154 orders </div>
                        </div>
                        <nav>
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home"
                                    aria-selected="true">Descripción</a>
                                    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile"
                                    aria-selected="false">Informacion adicional</a>
                                <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile"
                                    aria-selected="false">Autores</a>
                            </div>
                        </nav>
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">{{$libro->resumen}}</div>
                            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">Pendiente...</div>
                            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">Pendiente...</div>
                        </div>
                        <!-- rating-wrap.// -->
                        <hr>
                        <div class="row">
                            <div class="col-sm-5">
                                <dl class="dlist-inline">
                                    <dt>Quantity: </dt>
                                    <dd>
                                        <select class="form-control form-control-sm" style="width:70px;">
                              <option> 1 </option>
                              <option> 2 </option>
                              <option> 3 </option>
                          </select>
                                    </dd>
                                </dl>
                                <!-- item-property .// -->
                            </div>
                            <!-- col.// -->
                            <div class="col-sm-7">
                                <dl class="dlist-inline">
                                    <dt>Size: </dt>
                                    <dd>
                                        <label class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                              <span class="form-check-label">SM</span>
                            </label>
                                        <label class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                              <span class="form-check-label">MD</span>
                            </label>
                                        <label class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                              <span class="form-check-label">XXL</span>
                            </label>
                                    </dd>
                                </dl>
                                <!-- item-property .// -->
                            </div>
                            <!-- col.// -->
                        </div>
                        <!-- row.// -->
                        <hr>
                        <a href="#" class="btn  btn-dark"> Buy now </a>
                        <a href="#" class="btn  btn-outline-primary"> <i class="fas fa-shopping-cart"></i> Add to cart </a>
                    </article>
                    <!-- card-body.// -->
                </aside>
                <!-- col.// -->
            </div>
            <!-- row.// -->
        </div>
    </div>
</div>

<!-- card.// -->
@endsection