@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.prestadoresDeServicio.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.prestadores-de-servicios.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="nombre_razon_social">{{ trans('cruds.prestadoresDeServicio.fields.nombre_razon_social') }}</label>
                <input class="form-control {{ $errors->has('nombre_razon_social') ? 'is-invalid' : '' }}" type="text" name="nombre_razon_social" id="nombre_razon_social" value="{{ old('nombre_razon_social', '') }}" required>
                @if($errors->has('nombre_razon_social'))
                    <div class="invalid-feedback">
                        {{ $errors->first('nombre_razon_social') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.prestadoresDeServicio.fields.nombre_razon_social_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="direccion">{{ trans('cruds.prestadoresDeServicio.fields.direccion') }}</label>
                <input class="form-control {{ $errors->has('direccion') ? 'is-invalid' : '' }}" type="text" name="direccion" id="direccion" value="{{ old('direccion', '') }}" required>
                @if($errors->has('direccion'))
                    <div class="invalid-feedback">
                        {{ $errors->first('direccion') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.prestadoresDeServicio.fields.direccion_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="telefono">{{ trans('cruds.prestadoresDeServicio.fields.telefono') }}</label>
                <input class="form-control {{ $errors->has('telefono') ? 'is-invalid' : '' }}" type="text" name="telefono" id="telefono" value="{{ old('telefono', '') }}">
                @if($errors->has('telefono'))
                    <div class="invalid-feedback">
                        {{ $errors->first('telefono') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.prestadoresDeServicio.fields.telefono_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="telefono_2">{{ trans('cruds.prestadoresDeServicio.fields.telefono_2') }}</label>
                <input class="form-control {{ $errors->has('telefono_2') ? 'is-invalid' : '' }}" type="text" name="telefono_2" id="telefono_2" value="{{ old('telefono_2', '') }}">
                @if($errors->has('telefono_2'))
                    <div class="invalid-feedback">
                        {{ $errors->first('telefono_2') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.prestadoresDeServicio.fields.telefono_2_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="nombre_representate">{{ trans('cruds.prestadoresDeServicio.fields.nombre_representate') }}</label>
                <input class="form-control {{ $errors->has('nombre_representate') ? 'is-invalid' : '' }}" type="text" name="nombre_representate" id="nombre_representate" value="{{ old('nombre_representate', '') }}">
                @if($errors->has('nombre_representate'))
                    <div class="invalid-feedback">
                        {{ $errors->first('nombre_representate') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.prestadoresDeServicio.fields.nombre_representate_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="email">{{ trans('cruds.prestadoresDeServicio.fields.email') }}</label>
                <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="email" name="email" id="email" value="{{ old('email') }}">
                @if($errors->has('email'))
                    <div class="invalid-feedback">
                        {{ $errors->first('email') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.prestadoresDeServicio.fields.email_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="password">{{ trans('cruds.prestadoresDeServicio.fields.password') }}</label>
                <input class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" type="text" name="password" id="password" value="{{ old('password', '') }}">
                @if($errors->has('password'))
                    <div class="invalid-feedback">
                        {{ $errors->first('password') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.prestadoresDeServicio.fields.password_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="estado_id">{{ trans('cruds.prestadoresDeServicio.fields.estado') }}</label>
                <select class="form-control select2 {{ $errors->has('estado') ? 'is-invalid' : '' }}" name="estado_id" id="estado_id">
                    @foreach($estados as $id => $entry)
                        <option value="{{ $id }}" {{ old('estado_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('estado'))
                    <div class="invalid-feedback">
                        {{ $errors->first('estado') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.prestadoresDeServicio.fields.estado_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="municipio_id">{{ trans('cruds.prestadoresDeServicio.fields.municipio') }}</label>
                <select class="form-control select2 {{ $errors->has('municipio') ? 'is-invalid' : '' }}" name="municipio_id" id="municipio_id">
                    @foreach($municipios as $id => $entry)
                        <option value="{{ $id }}" {{ old('municipio_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('municipio'))
                    <div class="invalid-feedback">
                        {{ $errors->first('municipio') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.prestadoresDeServicio.fields.municipio_helper') }}</span>
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