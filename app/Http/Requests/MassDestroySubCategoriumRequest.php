<?php

namespace App\Http\Requests;

use App\Models\SubCategorium;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroySubCategoriumRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('sub_categorium_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:sub_categoria,id',
        ];
    }
}
