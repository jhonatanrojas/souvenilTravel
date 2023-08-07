@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.municipio.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.municipios.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="codigo_municipio">{{ trans('cruds.municipio.fields.codigo_municipio') }}</label>
                <input class="form-control {{ $errors->has('codigo_municipio') ? 'is-invalid' : '' }}" type="text" name="codigo_municipio" id="codigo_municipio" value="{{ old('codigo_municipio', '') }}" required>
                @if($errors->has('codigo_municipio'))
                    <div class="invalid-feedback">
                        {{ $errors->first('codigo_municipio') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.municipio.fields.codigo_municipio_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="codigo_estado_id">{{ trans('cruds.municipio.fields.codigo_estado') }}</label>
                <select class="form-control select2 {{ $errors->has('codigo_estado') ? 'is-invalid' : '' }}" name="codigo_estado_id" id="codigo_estado_id">
                    @foreach($codigo_estados as $id => $entry)
                        <option value="{{ $id }}" {{ old('codigo_estado_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('codigo_estado'))
                    <div class="invalid-feedback">
                        {{ $errors->first('codigo_estado') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.municipio.fields.codigo_estado_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="nombre">{{ trans('cruds.municipio.fields.nombre') }}</label>
                <input class="form-control {{ $errors->has('nombre') ? 'is-invalid' : '' }}" type="text" name="nombre" id="nombre" value="{{ old('nombre', '') }}">
                @if($errors->has('nombre'))
                    <div class="invalid-feedback">
                        {{ $errors->first('nombre') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.municipio.fields.nombre_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection