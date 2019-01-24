<?php

namespace Bookstore\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBookRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'ISBN'=>'required|max:191',
            'nombre'=>'required|max:255',
            'n_paginas'=>'required|numeric',
            'precio'=>'required|numeric',
            'fecha_publicacion'=>'numeric|required',      
            'stock'=>'required|numeric',
            'peso'=>'nullable|numeric',
            'foto_dir'=>'mimes:jpeg,bmp,png'
        ];
    }
}
