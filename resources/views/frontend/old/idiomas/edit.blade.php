@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.edit') }} {{ trans('cruds.idioma.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.idiomas.update", [$idioma->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label for="codigo">{{ trans('cruds.idioma.fields.codigo') }}</label>
                            <input class="form-control" type="text" name="codigo" id="codigo" value="{{ old('codigo', $idioma->codigo) }}">
                            @if($errors->has('codigo'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('codigo') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.idioma.fields.codigo_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="texto">{{ trans('cruds.idioma.fields.texto') }}</label>
                            <input class="form-control" type="text" name="texto" id="texto" value="{{ old('texto', $idioma->texto) }}" required>
                            @if($errors->has('texto'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('texto') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.idioma.fields.texto_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="lang">{{ trans('cruds.idioma.fields.lang') }}</label>
                            <input class="form-control" type="text" name="lang" id="lang" value="{{ old('lang', $idioma->lang) }}">
                            @if($errors->has('lang'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('lang') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.idioma.fields.lang_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="posicion">{{ trans('cruds.idioma.fields.posicion') }}</label>
                            <input class="form-control" type="text" name="posicion" id="posicion" value="{{ old('posicion', $idioma->posicion) }}">
                            @if($errors->has('posicion'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('posicion') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.idioma.fields.posicion_helper') }}</span>
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