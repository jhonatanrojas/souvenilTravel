@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.edit') }} {{ trans('cruds.estado.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.estados.update", [$estado->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label for="codigoestado">{{ trans('cruds.estado.fields.codigoestado') }}</label>
                            <input class="form-control" type="text" name="codigoestado" id="codigoestado" value="{{ old('codigoestado', $estado->codigoestado) }}">
                            @if($errors->has('codigoestado'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('codigoestado') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.estado.fields.codigoestado_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="nombre">{{ trans('cruds.estado.fields.nombre') }}</label>
                            <input class="form-control" type="text" name="nombre" id="nombre" value="{{ old('nombre', $estado->nombre) }}">
                            @if($errors->has('nombre'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('nombre') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.estado.fields.nombre_helper') }}</span>
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