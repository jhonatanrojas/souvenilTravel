<?php

namespace App\Http\Requests;

use App\Models\Enlace;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreEnlaceRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('enlace_create');
    }

    public function rules()
    {
        return [
            'nombre' => [
                'string',
                'required',
            ],
            'url' => [
                'string',
                'required',
            ],
        ];
    }
}
