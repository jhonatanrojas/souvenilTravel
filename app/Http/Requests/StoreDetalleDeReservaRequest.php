<?php

namespace App\Http\Requests;

use App\Models\DetalleDeReserva;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreDetalleDeReservaRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('detalle_de_reserva_create');
    }

    public function rules()
    {
        return [
            'reserva_id' => [
                'required',
                'integer',
            ],
            'producto_id' => [
                'required',
                'integer',
            ],
            'cant_adultos' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'cant_ninos' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'fecha_desde' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'fecha_hasta' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'moneda' => [
                'string',
                'nullable',
            ],
            'precio' => [
                'required',
            ],
            'total' => [
                'required',
            ],
        ];
    }
}
