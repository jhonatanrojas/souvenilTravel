@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.estado.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.estados.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.estado.fields.id') }}
                        </th>
                        <td>
                            {{ $estado->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.estado.fields.codigoestado') }}
                        </th>
                        <td>
                            {{ $estado->codigoestado }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.estado.fields.nombre') }}
                        </th>
                        <td>
                            {{ $estado->nombre }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.estados.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        {{ trans('global.relatedData') }}
    </div>
    <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
        <li class="nav-item">
            <a class="nav-link" href="#codigo_estado_municipios" role="tab" data-toggle="tab">
                {{ trans('cruds.municipio.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#codigo_estado_destinos" role="tab" data-toggle="tab">
                {{ trans('cruds.destino.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="codigo_estado_municipios">
            @includeIf('admin.estados.relationships.codigoEstadoMunicipios', ['municipios' => $estado->codigoEstadoMunicipios])
        </div>
        <div class="tab-pane" role="tabpanel" id="codigo_estado_destinos">
            @includeIf('admin.estados.relationships.codigoEstadoDestinos', ['destinos' => $estado->codigoEstadoDestinos])
        </div>
    </div>
</div>

@endsection