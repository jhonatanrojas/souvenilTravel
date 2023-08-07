<?php

namespace App\Http\Requests;

use App\Models\Idioma;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateIdiomaRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('idioma_edit');
    }

    public function rules()
    {
        return [
            'codigo' => [
                'string',
                'max:100',
                'nullable',
            ],
            'texto' => [
                'string',
                'required',
            ],
            'lang' => [
                'string',
                'nullable',
            ],
            'posicion' => [
                'string',
                'nullable',
            ],
        ];
    }
}
