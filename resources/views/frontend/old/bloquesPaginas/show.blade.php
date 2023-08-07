@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.show') }} {{ trans('cruds.bloquesPagina.title') }}
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.bloques-paginas.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.bloquesPagina.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $bloquesPagina->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.bloquesPagina.fields.nombre') }}
                                    </th>
                                    <td>
                                        {{ $bloquesPagina->nombre }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.bloquesPagina.fields.posicion') }}
                                    </th>
                                    <td>
                                        {{ App\Models\BloquesPagina::POSICION_SELECT[$bloquesPagina->posicion] ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.bloquesPagina.fields.pagina') }}
                                    </th>
                                    <td>
                                        {{ $bloquesPagina->pagina }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.bloquesPagina.fields.tipo') }}
                                    </th>
                                    <td>
                                        {{ App\Models\BloquesPagina::TIPO_SELECT[$bloquesPagina->tipo] ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.bloquesPagina.fields.conetenido') }}
                                    </th>
                                    <td>
                                        {!! $bloquesPagina->conetenido !!}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.bloquesPagina.fields.orden') }}
                                    </th>
                                    <td>
                                        {{ $bloquesPagina->orden }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.bloquesPagina.fields.estatus') }}
                                    </th>
                                    <td>
                                        <input type="checkbox" disabled="disabled" {{ $bloquesPagina->estatus ? 'checked' : '' }}>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.bloques-paginas.index') }}">
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