@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.create') }} {{ trans('cruds.destino.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.destinos.store") }}" enctype="multipart/form-data">
                        @method('POST')
                        @csrf
                        <div class="form-group">
                            <label for="codigo_municipio_id">{{ trans('cruds.destino.fields.codigo_municipio') }}</label>
                            <select class="form-control select2" name="codigo_municipio_id" id="codigo_municipio_id">
                                @foreach($codigo_municipios as $id => $entry)
                                    <option value="{{ $id }}" {{ old('codigo_municipio_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('codigo_municipio'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('codigo_municipio') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.destino.fields.codigo_municipio_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="codigo_estado_id">{{ trans('cruds.destino.fields.codigo_estado') }}</label>
                            <select class="form-control select2" name="codigo_estado_id" id="codigo_estado_id">
                                @foreach($codigo_estados as $id => $entry)
                                    <option value="{{ $id }}" {{ old('codigo_estado_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('codigo_estado'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('codigo_estado') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.destino.fields.codigo_estado_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="nombre">{{ trans('cruds.destino.fields.nombre') }}</label>
                            <input class="form-control" type="text" name="nombre" id="nombre" value="{{ old('nombre', '') }}">
                            @if($errors->has('nombre'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('nombre') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.destino.fields.nombre_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-danger" type="submit">
                                {{ trans('global.save') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection