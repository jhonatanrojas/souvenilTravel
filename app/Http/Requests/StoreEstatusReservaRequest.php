<?php

namespace App\Http\Requests;

use App\Models\EstatusReserva;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreEstatusReservaRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('estatus_reserva_create');
    }

    public function rules()
    {
        return [
            'descripcion' => [
                'string',
                'required',
            ],
        ];
    }
}
