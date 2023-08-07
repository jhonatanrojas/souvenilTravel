<?php

namespace App\Http\Requests;

use App\Models\Product;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateProductRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('product_edit');
    }

    public function rules()
    {
        return [
            'prestador_servicios.*' => [
                'integer',
            ],
            'prestador_servicios' => [
                'array',
            ],
            'name' => [
                'string',
                'required',
            ],
            'nro_adultos' => [
                'required',
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'nro_ninos' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'direccion' => [
                'string',
                'nullable',
            ],
            'diponible_desde' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'disponible_hasta' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'price' => [
                'required',
            ],
            'tags.*' => [
                'integer',
            ],
            'tags' => [
                'array',
            ],
            'photo' => [
                'array',
            ],
            'latitud' => [
                'string',
                'nullable',
            ],
            'logitud' => [
                'string',
                'nullable',
            ],
        ];
    }
}
