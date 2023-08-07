<?php

namespace App\Http\Requests;

use App\Models\Reserva;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateReservaRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('reserva_edit');
    }

    public function rules()
    {
        return [
            'nro_reserva' => [
                'string',
                'required',
                'unique:reservas,nro_reserva,' . request()->route('reserva')->id,
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
