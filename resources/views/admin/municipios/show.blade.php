@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.municipio.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.municipios.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.municipio.fields.id') }}
                        </th>
                        <td>
                            {{ $municipio->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.municipio.fields.codigo_municipio') }}
                        </th>
                        <td>
                            {{ $municipio->codigo_municipio }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.municipio.fields.codigo_estado') }}
                        </th>
                        <td>
                            {{ $municipio->codigo_estado->nombre ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.municipio.fields.nombre') }}
                        </th>
                        <td>
                            {{ $municipio->nombre }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.municipios.index') }}">
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
            <a class="nav-link" href="#codigo_municipio_destinos" role="tab" data-toggle="tab">
                {{ trans('cruds.destino.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="codigo_municipio_destinos">
            @includeIf('admin.municipios.relationships.codigoMunicipioDestinos', ['destinos' => $municipio->codigoMunicipioDestinos])
        </div>
    </div>
</div>

@endsection