<?php

namespace App\Http\Requests;

use App\Models\BloquesPagina;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateBloquesPaginaRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('bloques_pagina_edit');
    }

    public function rules()
    {
        return [
            'nombre' => [
                'string',
                'required',
            ],
            'posicion' => [
                'required',
            ],
            'pagina' => [
                'string',
                'nullable',
            ],
            'orden' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}
