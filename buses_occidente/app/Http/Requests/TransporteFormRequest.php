<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TransporteFormRequest extends FormRequest
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
        'descripcion' =>'required|string|max:30',
        'cantidad_asientos'=>'required',
        'placa'=>'required|string|max:12',
        'marca'=>'required|string|max:25',
        'color'=>'required|string|max:12',
        'capacidad_libras'=>'required',
        'costo'=>'required'
        ];
    }
}
