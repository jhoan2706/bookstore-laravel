<?php

namespace Prueba;

use Illuminate\Database\Eloquent\Model;

class Libro extends Model
{
    public function autors()
    {
        return $this->belongsToMany('Prueba\Autor');
    }
    public function categoria_libro()
    {
        return $this->belongsTo('Prueba\CategoriaLibro');
    }
}
