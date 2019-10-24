<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LugarFormRequest extends FormRequest
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
            'Nombre_origen' => 'required|string|max:45',
            'Nombre_destino' => 'required|string|max:45',
            'Costo_pasaje' => 'required',
            'Costo_paquete' => 'required'
        ];
    }
}
