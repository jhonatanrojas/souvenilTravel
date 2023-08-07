@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.edit') }} {{ trans('cruds.enlace.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.enlaces.update", [$enlace->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label class="required" for="nombre">{{ trans('cruds.enlace.fields.nombre') }}</label>
                            <input class="form-control" type="text" name="nombre" id="nombre" value="{{ old('nombre', $enlace->nombre) }}" required>
                            @if($errors->has('nombre'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('nombre') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.enlace.fields.nombre_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="url">{{ trans('cruds.enlace.fields.url') }}</label>
                            <input class="form-control" type="text" name="url" id="url" value="{{ old('url', $enlace->url) }}" required>
                            @if($errors->has('url'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('url') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.enlace.fields.url_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label>{{ trans('cruds.enlace.fields.target') }}</label>
                            <select class="form-control" name="target" id="target">
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
                            <select class="form-control" name="grupo" id="grupo">
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
                            <span class="help-block">{{ trans('cruds.enlace.fields.grupo_helper') }}</span>
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