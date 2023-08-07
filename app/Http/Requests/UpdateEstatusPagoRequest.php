<?php

namespace App\Http\Requests;

use App\Models\EstatusPago;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateEstatusPagoRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('estatus_pago_edit');
    }

    public function rules()
    {
        return [
            'descripcion' => [
                'string',
                'nullable',
            ],
        ];
    }
}
