<?php

namespace Bookstore;

use Illuminate\Database\Eloquent\Model;

class Pais extends Model
{
    public function autores(){
      return $this->hasMany('Bookstore\Autor');
    }
}
