<?php

namespace App\Http\Requests;

use App\Models\Destino;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateDestinoRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('destino_edit');
    }

    public function rules()
    {
        return [
            'nombre' => [
                'string',
                'max:100',
                'nullable',
            ],
        ];
    }
}
