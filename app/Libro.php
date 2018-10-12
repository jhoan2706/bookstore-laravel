<?php

namespace Prueba;

use Illuminate\Database\Eloquent\Model;

class Libro extends Model
{
    protected $fillable=['nombre','resumen','npagina','edicion','autor','precio'];
}
