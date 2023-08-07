<?php

namespace App\Http\Requests;

use App\Models\EstatusPago;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyEstatusPagoRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('estatus_pago_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:estatus_pagos,id',
        ];
    }
}
