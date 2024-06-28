@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.estado.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.estados.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="codigoestado">{{ trans('cruds.estado.fields.codigoestado') }}</label>
                <input class="form-control {{ $errors->has('codigoestado') ? 'is-invalid' : '' }}" type="text" name="codigoestado" id="codigoestado" value="{{ old('codigoestado', '') }}">
                @if($errors->has('codigoestado'))
                    <div class="invalid-feedback">
                        {{ $errors->first('codigoestado') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.estado.fields.codigoestado_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="nombre">{{ trans('cruds.estado.fields.nombre') }}</label>
                <input class="form-control {{ $errors->has('nombre') ? 'is-invalid' : '' }}" type="text" name="nombre" id="nombre" value="{{ old('nombre', '') }}">
                @if($errors->has('nombre'))
                    <div class="invalid-feedback">
                        {{ $errors->first('nombre') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.estado.fields.nombre_helper') }}</span>
            </div>

            <div class="form-group">
                <label for="descripcion">{{ trans('Descripcion') }}</label>
                <input class="form-control {{ $errors->has('descripcion') ? 'is-invalid' : '' }}" type="text" name="descripcion" id="descripcion" value="{{ old('descripcion', '') }}">
                @if($errors->has('descripcion'))
                    <div class="invalid-feedback">
                        {{ $errors->first('descripcion') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.estado.fields.nombre_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="orden">{{ trans('Orden') }}</label>
                <input class="form-control {{ $errors->has('orden') ? 'is-invalid' : '' }}" type="text" name="orden" id="orden" value="{{ old('orden', '') }}">
                @if($errors->has('orden'))
                    <div class="invalid-feedback">
                        {{ $errors->first('orden') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('Orden') }}</span>
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