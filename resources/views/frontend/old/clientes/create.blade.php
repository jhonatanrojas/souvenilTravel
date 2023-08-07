@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.create') }} {{ trans('cruds.cliente.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.clientes.store") }}" enctype="multipart/form-data">
                        @method('POST')
                        @csrf
                        <div class="form-group">
                            <label class="required" for="nombres">{{ trans('cruds.cliente.fields.nombres') }}</label>
                            <input class="form-control" type="text" name="nombres" id="nombres" value="{{ old('nombres', '') }}" required>
                            @if($errors->has('nombres'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('nombres') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.cliente.fields.nombres_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="apellidos">{{ trans('cruds.cliente.fields.apellidos') }}</label>
                            <input class="form-control" type="text" name="apellidos" id="apellidos" value="{{ old('apellidos', '') }}">
                            @if($errors->has('apellidos'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('apellidos') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.cliente.fields.apellidos_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="telefono">{{ trans('cruds.cliente.fields.telefono') }}</label>
                            <input class="form-control" type="number" name="telefono" id="telefono" value="{{ old('telefono', '') }}" step="1">
                            @if($errors->has('telefono'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('telefono') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.cliente.fields.telefono_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="direccion">{{ trans('cruds.cliente.fields.direccion') }}</label>
                            <input class="form-control" type="text" name="direccion" id="direccion" value="{{ old('direccion', '') }}">
                            @if($errors->has('direccion'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('direccion') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.cliente.fields.direccion_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="cedula">{{ trans('cruds.cliente.fields.cedula') }}</label>
                            <input class="form-control" type="text" name="cedula" id="cedula" value="{{ old('cedula', '') }}">
                            @if($errors->has('cedula'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('cedula') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.cliente.fields.cedula_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="email">{{ trans('cruds.cliente.fields.email') }}</label>
                            <input class="form-control" type="text" name="email" id="email" value="{{ old('email', '') }}" required>
                            @if($errors->has('email'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('email') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.cliente.fields.email_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="password">{{ trans('cruds.cliente.fields.password') }}</label>
                            <input class="form-control" type="text" name="password" id="password" value="{{ old('password', '') }}" required>
                            @if($errors->has('password'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('password') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.cliente.fields.password_helper') }}</span>
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