@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.adminConfig.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.admin-configs.update", [$adminConfig->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="grupo">{{ trans('cruds.adminConfig.fields.grupo') }}</label>
                <input class="form-control {{ $errors->has('grupo') ? 'is-invalid' : '' }}" type="text" name="grupo" id="grupo" value="{{ old('grupo', $adminConfig->grupo) }}" required>
                @if($errors->has('grupo'))
                    <div class="invalid-feedback">
                        {{ $errors->first('grupo') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.adminConfig.fields.grupo_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="codigo">{{ trans('cruds.adminConfig.fields.codigo') }}</label>
                <input class="form-control {{ $errors->has('codigo') ? 'is-invalid' : '' }}" type="text" name="codigo" id="codigo" value="{{ old('codigo', $adminConfig->codigo) }}" required>
                @if($errors->has('codigo'))
                    <div class="invalid-feedback">
                        {{ $errors->first('codigo') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.adminConfig.fields.codigo_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="valor">{{ trans('cruds.adminConfig.fields.valor') }}</label>
                <input class="form-control {{ $errors->has('valor') ? 'is-invalid' : '' }}" type="text" name="valor" id="valor" value="{{ old('valor', $adminConfig->valor) }}" required>
                @if($errors->has('valor'))
                    <div class="invalid-feedback">
                        {{ $errors->first('valor') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.adminConfig.fields.valor_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="descripcion">{{ trans('cruds.adminConfig.fields.descripcion') }}</label>
                <input class="form-control {{ $errors->has('descripcion') ? 'is-invalid' : '' }}" type="text" name="descripcion" id="descripcion" value="{{ old('descripcion', $adminConfig->descripcion) }}">
                @if($errors->has('descripcion'))
                    <div class="invalid-feedback">
                        {{ $errors->first('descripcion') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.adminConfig.fields.descripcion_helper') }}</span>
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