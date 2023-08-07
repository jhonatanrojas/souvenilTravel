<?php

namespace App\Http\Requests;

use App\Models\Municipio;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateMunicipioRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('municipio_edit');
    }

    public function rules()
    {
        return [
            'codigo_municipio' => [
                'string',
                'required',
            ],
            'nombre' => [
                'string',
                'max:100',
                'nullable',
            ],
        ];
    }
}
