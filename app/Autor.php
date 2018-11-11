<?php

namespace Bookstore;

use Illuminate\Database\Eloquent\Model;

class Autor extends Model
{
    protected $fillable = ['nombre', 'apellido', 'fecha_nacimiento'];

    public function pais()
    {
        return $this->belongsTo('Bookstore\Pais');
    }
    public function libros()
    {
        return $this->belongsToMany('Bookstore\Libro');
    }
    public function scopeNombre($query, $nombre)
    {
        if (trim($nombre) != "") {
            return $query->where("nombre", "LIKE", "$nombre%");
        }
    }
    public function scopeApellido($query, $apellido)
    {
        if (trim($apellido) != "") {
            return $query->where("apellido", "LIKE", "$apellido%");
        }
    }
    public function scopePais($query, $pais_query)
    {
        if ($pais_query) {
            return $query->whereIn("pais_id", $pais_query);
        }
    }
}
