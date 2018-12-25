<?php

namespace Bookstore\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class Autor extends Resource
{    
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        //return parent::toArray($request);
        return [
            'id' => $this->id,
            'nombre' => $this->nombre,
            'apellido' => $this->apellido,
            'fecha_nacimiento' => $this->fecha_nacimiento,
            'pais' => $this->pais->nombre,
        ];
    }
    public function with($request)
    {   
        return [
            'version'=>'1.0.0',
            'author_url'=>'some_autor_url.com'
        ];
    }
}
