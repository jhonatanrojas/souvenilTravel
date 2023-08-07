<?php

namespace App\Http\Requests;

use App\Models\Divisa;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyDivisaRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('divisa_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:divisas,id',
        ];
    }
}
