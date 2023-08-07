<?php

namespace App\Http\Requests;

use App\Models\Divisa;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreDivisaRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('divisa_create');
    }

    public function rules()
    {
        return [
            'codigo' => [
                'string',
                'required',
            ],
        ];
    }
}
