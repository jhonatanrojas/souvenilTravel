<?php

namespace App\Http\Requests;

use App\Models\Cliente;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateClienteRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('cliente_edit');
    }

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
            ],
            'password' => [
                'string',
                'required',
            ],
        ];
    }
}
