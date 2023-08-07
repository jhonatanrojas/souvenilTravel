<?php

namespace App\Http\Requests;

use App\Models\AdminConfig;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyAdminConfigRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('admin_config_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:admin_configs,id',
        ];
    }
}
