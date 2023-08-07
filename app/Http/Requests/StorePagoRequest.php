<?php

namespace App\Http\Requests;

use App\Models\Pago;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StorePagoRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('pago_create');
    }

    public function rules()
    {
        return [
            'monto' => [
                'required',
            ],
            'moneda' => [
                'string',
                'max:100',
                'nullable',
            ],
            'fecha_de_pago' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'forma_de_pago' => [
                'string',
                'nullable',
            ],
        ];
    }
}
