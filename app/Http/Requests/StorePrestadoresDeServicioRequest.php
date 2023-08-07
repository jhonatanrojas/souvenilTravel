<?php

namespace App\Http\Requests;

use App\Models\PrestadoresDeServicio;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StorePrestadoresDeServicioRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('prestadores_de_servicio_create');
    }

    public function rules()
    {
        return [
            'nombre_razon_social' => [
                'string',
                'required',
            ],
            'direccion' => [
                'string',
                'required',
            ],
            'telefono' => [
                'string',
                'max:100',
                'nullable',
            ],
            'telefono_2' => [
                'string',
                'max:100',
                'nullable',
            ],
            'nombre_representate' => [
                'string',
                'nullable',
            ],
            'password' => [
                'string',
                'nullable',
            ],
        ];
    }
}
