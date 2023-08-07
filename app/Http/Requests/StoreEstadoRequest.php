<?php

namespace App\Http\Requests;

use App\Models\Estado;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreEstadoRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('estado_create');
    }

    public function rules()
    {
        return [
            'codigoestado' => [
                'string',
                'max:20',
                'nullable',
            ],
            'nombre' => [
                'string',
                'max:100',
                'nullable',
            ],
        ];
    }
}
