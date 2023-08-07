<?php

namespace App\Http\Requests;

use App\Models\AdminConfig;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreAdminConfigRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('admin_config_create');
    }

    public function rules()
    {
        return [
            'grupo' => [
                'string',
                'max:100',
                'required',
            ],
            'codigo' => [
                'string',
                'required',
            ],
            'valor' => [
                'string',
                'required',
            ],
            'descripcion' => [
                'string',
                'nullable',
            ],
        ];
    }
}
