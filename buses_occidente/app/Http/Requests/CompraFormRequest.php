<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompraFormRequest extends FormRequest
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
        'idTransporte' => 'required',
        'cantidad' => 'required',
        'Fecha_compra' => 'required',
        'Precio_unitario' => 'required',
        'Total' =>'required',
        'numero_facturacompra' =>'required',
        ];
    }
}
