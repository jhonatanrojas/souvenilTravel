<?php

namespace App\Http\Requests;

use App\Models\DetalleDeReserva;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyDetalleDeReservaRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('detalle_de_reserva_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:detalle_de_reservas,id',
        ];
    }
}
