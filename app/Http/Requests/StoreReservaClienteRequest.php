<?php

namespace App\Http\Requests;

use App\Models\Cliente;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreReservaClienteRequest extends FormRequest
{
  

    public function rules()
    {
        return [

            'nombres' => [
                'string',
                'required',
            ],
            'apellidos' => [
                'string',
                'nullable',
            ],
            'telefono' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'direccion' => [
                'string',
                'nullable',
            ],
            'cedula' => [
                'string',
                'nullable',
            ],
            'email' => [
                'string',
                'required',
                'unique:clientes'
            ],
            'carritoCompra'=> [
                'string',
                'nullable',
            ],
            'password' => [
                'string',
                'required',
            ],
        ];
    }
}
