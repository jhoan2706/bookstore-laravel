<?php

namespace Prueba;

use Illuminate\Database\Eloquent\Model;

class Autor extends Model
{
    public function pais(){
      return $this->belongsTo('Prueba\Pais');
    }
    public function scopeNombre($query,$nombre)
    {
      if (trim($nombre)!="") {
        return $query->where("nombre","LIKE","$nombre%");  
      }      
    }
    public function scopeApellido($query,$apellido)
    {
      if (trim($apellido)!="") {
        return $query->where("apellido","LIKE","$apellido%");
      }
    }
    public function scopePais($query,$pais_query)
    {
      if ($pais_query) {
        return $query->whereIn("pais_id",$pais_query);
      }
    } 
}
