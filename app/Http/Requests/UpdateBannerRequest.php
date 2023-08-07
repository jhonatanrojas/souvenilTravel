<?php

namespace App\Http\Requests;

use App\Models\Banner;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateBannerRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('banner_edit');
    }

    public function rules()
    {
        return [
            'imagen' => [
                'required',
            ],
            'url' => [
                'string',
                'nullable',
            ],
            'target' => [
                'string',
                'max:100',
                'nullable',
            ],
            'titulo' => [
                'string',
                'nullable',
            ],
            'ubicacion' => [
                'required',
            ],
            'orden' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}
