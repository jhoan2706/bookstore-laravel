<?php

namespace Bookstore;

use Illuminate\Database\Eloquent\Model;

class Libro extends Model
{
    public function autors()
    {
        return $this->belongsToMany('Bookstore\Autor');
    }
    public function categoria_libro()
    {
        return $this->belongsTo('Bookstore\CategoriaLibro');
    }
}
