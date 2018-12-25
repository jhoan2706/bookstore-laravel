<?php

namespace Bookstore\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAutorRequest extends FormRequest
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
            'nombre'=>'required|max:100',
            'apellido'=>'required|max:100',
            'nombre'=>'required|max:100',
            'foto_dir'=>'image',
            'pais_id'=>'numeric|required',          
            'fecha_nacimiento'=>'required'
        ];
    }
}
