<?php

namespace Bookstore;

use Illuminate\Database\Eloquent\Model;

class Libro extends Model
{
    protected $fillable = ['nombre', 'resumen', 'n_paginas','precio','fecha_publicacion','categoria_libro_id','stock','edicion','formato','peso'];

    public function autors()
    {
        return $this->belongsToMany('Bookstore\Autor');
    }
    public function categoria_libro()
    {
        return $this->belongsTo('Bookstore\CategoriaLibro');
    }
    public function scopeTitulo($query, $nombre)
    {
        if (trim($nombre) != "") {
            return $query->where("nombre", "LIKE", "%$nombre%");
        }
    }
    public function scopeCategoria($query,$categoria_id)
    {
        if ($categoria_id!="") {
            return $query->where("categoria_libro_id",$categoria_id);
        }
    }
    public function scopePrecio($query,$precio1,$precio2)
    {
        if (trim($precio1)!="" && trim($precio2)!="") {
            return $query->whereBetween('precio',[$precio1,$precio2]);
        }
    }
    public function scopeFecha($query,$year)
    {
        if (trim($year)!="") {
            return $query->whereYear('fecha_publicacion', $year);
        }
    }
}
