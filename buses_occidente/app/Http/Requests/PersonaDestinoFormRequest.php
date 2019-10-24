<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PersonaDestinoFormRequest extends FormRequest
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
        'nombres' => 'required|string|max:30',
        'apellidos' => 'required|string|max:30',
        'Telefono_uno' => 'required|max:12',
        'Direccion' => 'required|string|max:40',
        
        ];
    }
}
