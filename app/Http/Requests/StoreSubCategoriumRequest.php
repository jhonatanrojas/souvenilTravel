<?php

namespace App\Http\Requests;

use App\Models\SubCategorium;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreSubCategoriumRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('sub_categorium_create');
    }

    public function rules()
    {
        return [
            'nombre' => [
                'string',
                'required',
            ],
        ];
    }
}
