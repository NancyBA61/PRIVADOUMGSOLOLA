<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PersonaFormRequest extends FormRequest
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
        'Nombre' => 'required|string|max:30',
        'Apellido' => 'required|string|max:30',
        'Telefono' => 'required|max:12',
        'Direccion' => 'required|string|max:45',
        'Correo_electronico' => 'required|email|max:30',
        'Tipo_persona' =>'required|string|max:30'
        ];
    }
}
