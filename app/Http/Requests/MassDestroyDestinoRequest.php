<?php

namespace App\Http\Requests;

use App\Models\Destino;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyDestinoRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('destino_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:destinos,id',
        ];
    }
}
