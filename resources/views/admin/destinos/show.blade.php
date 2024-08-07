@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.destino.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.destinos.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.destino.fields.id') }}
                        </th>
                        <td>
                            {{ $destino->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.destino.fields.codigo_municipio') }}
                        </th>
                        <td>
                            {{ $destino->codigo_municipio->codigo_municipio ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.destino.fields.codigo_estado') }}
                        </th>
                        <td>
                            {{ $destino->codigo_estado->nombre ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.destino.fields.nombre') }}
                        </th>
                        <td>
                            {{ $destino->nombre }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.destino.fields.fhotos') }}
                        </th>
                        <td>
                            @foreach($destino->fhotos as $key => $media)
                                <a href="{{ $media->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $media->getUrl('thumb') }}">
                                </a>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.destino.fields.nombre_eje') }}
                        </th>
                        <td>
                            {{ $destino->nombre_eje }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.destinos.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection