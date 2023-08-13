@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.enlace.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.enlaces.update", [$enlace->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="nombre">{{ trans('cruds.enlace.fields.nombre') }}</label>
                <input class="form-control {{ $errors->has('nombre') ? 'is-invalid' : '' }}" type="text" name="nombre" id="nombre" value="{{ old('nombre', $enlace->nombre) }}" required>
                @if($errors->has('nombre'))
                    <div class="invalid-feedback">
                        {{ $errors->first('nombre') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.enlace.fields.nombre_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="url">{{ trans('cruds.enlace.fields.url') }}</label>
                <input class="form-control {{ $errors->has('url') ? 'is-invalid' : '' }}" type="text" name="url" id="url" value="{{ old('url', $enlace->url) }}" required>
                @if($errors->has('url'))
                    <div class="invalid-feedback">
                        {{ $errors->first('url') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.enlace.fields.url_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.enlace.fields.target') }}</label>
                <select class="form-control {{ $errors->has('target') ? 'is-invalid' : '' }}" name="target" id="target">
                    <option value disabled {{ old('target', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Enlace::TARGET_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('target', $enlace->target) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('target'))
                    <div class="invalid-feedback">
                        {{ $errors->first('target') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.enlace.fields.target_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.enlace.fields.grupo') }}</label>
                <select class="form-control {{ $errors->has('grupo') ? 'is-invalid' : '' }}" name="grupo" id="grupo">
                    <option value disabled {{ old('grupo', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Enlace::GRUPO_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('grupo', $enlace->grupo) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('grupo'))
                    <div class="invalid-feedback">
                        {{ $errors->first('grupo') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('Orden') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="orden">{{ trans('cruds.enlace.fields.orden') }}</label>
                <input class="form-control {{ $errors->has('orden') ? 'is-invalid' : '' }}" type="number" name="orden" id="orden" value="{{ old('orden',$enlace->orden) }}" required>
                @if($errors->has('orden'))
                    <div class="invalid-feedback">
                        {{ $errors->first('orden') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('Orden') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="icono">{{ trans('cruds.enlace.fields.icono') }}</label>
                <input class="form-control {{ $errors->has('icono') ? 'is-invalid' : '' }}" type="text" name="icono" id="icono" value="{{ old('icono', $enlace->icono) }}" required>
                @if($errors->has('icono'))
                    <div class="invalid-feedback">
                        {{ $errors->first('icono') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('icono') }}</span>
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