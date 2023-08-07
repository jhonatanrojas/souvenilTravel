@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.show') }} {{ trans('cruds.enlace.title') }}
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.enlaces.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.enlace.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $enlace->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.enlace.fields.nombre') }}
                                    </th>
                                    <td>
                                        {{ $enlace->nombre }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.enlace.fields.url') }}
                                    </th>
                                    <td>
                                        {{ $enlace->url }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.enlace.fields.target') }}
                                    </th>
                                    <td>
                                        {{ App\Models\Enlace::TARGET_SELECT[$enlace->target] ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.enlace.fields.grupo') }}
                                    </th>
                                    <td>
                                        {{ App\Models\Enlace::GRUPO_SELECT[$enlace->grupo] ?? '' }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.enlaces.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection