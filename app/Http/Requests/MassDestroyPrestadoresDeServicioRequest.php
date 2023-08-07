<?php

namespace App\Http\Requests;

use App\Models\PrestadoresDeServicio;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyPrestadoresDeServicioRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('prestadores_de_servicio_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:prestadores_de_servicios,id',
        ];
    }
}
