<?php

namespace Prueba;

use Illuminate\Database\Eloquent\Model;

class CategoriaLibro extends Model
{
    public function libros()
    {
        return $this->hasMany('Prueba\Libro');
    }
}
