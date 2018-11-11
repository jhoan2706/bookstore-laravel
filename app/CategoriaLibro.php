<?php

namespace Bookstore;

use Illuminate\Database\Eloquent\Model;

class CategoriaLibro extends Model
{
    public function libros()
    {
        return $this->hasMany('Bookstore\Libro');
    }
}
