<?php

namespace Bookstore;

use Illuminate\Database\Eloquent\Model;

class Trainer extends Model {

    protected $fillable = ['name', 'avatar','slug'];//que campos me va a actualizar el modelo con el form

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName() {
        return 'slug';
    }

}
