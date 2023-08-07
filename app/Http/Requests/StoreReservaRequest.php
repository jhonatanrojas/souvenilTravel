<?php

namespace App\Http\Requests;

use App\Models\Reserva;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreReservaRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('reserva_create');
    }

    public function rules()
    {
        return [
            'nro_reserva' => [
                'string',
                'required',
                'unique:reservas',
            ],
            'subtotal' => [
                'required',
            ],
            'moneda' => [
                'string',
                'nullable',
            ],
            'fecha_reserva' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
        ];
    }
}
