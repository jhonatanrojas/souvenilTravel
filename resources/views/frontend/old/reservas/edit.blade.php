@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.edit') }} {{ trans('cruds.reserva.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.reservas.update", [$reserva->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label class="required" for="nro_reserva">{{ trans('cruds.reserva.fields.nro_reserva') }}</label>
                            <input class="form-control" type="text" name="nro_reserva" id="nro_reserva" value="{{ old('nro_reserva', $reserva->nro_reserva) }}" required>
                            @if($errors->has('nro_reserva'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('nro_reserva') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.reserva.fields.nro_reserva_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="cliente_id">{{ trans('cruds.reserva.fields.cliente') }}</label>
                            <select class="form-control select2" name="cliente_id" id="cliente_id">
                                @foreach($clientes as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('cliente_id') ? old('cliente_id') : $reserva->cliente->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('cliente'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('cliente') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.reserva.fields.cliente_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="subtotal">{{ trans('cruds.reserva.fields.subtotal') }}</label>
                            <input class="form-control" type="number" name="subtotal" id="subtotal" value="{{ old('subtotal', $reserva->subtotal) }}" step="0.01" required>
                            @if($errors->has('subtotal'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('subtotal') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.reserva.fields.subtotal_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="total">{{ trans('cruds.reserva.fields.total') }}</label>
                            <input class="form-control" type="number" name="total" id="total" value="{{ old('total', $reserva->total) }}" step="0.01">
                            @if($errors->has('total'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('total') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.reserva.fields.total_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="moneda">{{ trans('cruds.reserva.fields.moneda') }}</label>
                            <input class="form-control" type="text" name="moneda" id="moneda" value="{{ old('moneda', $reserva->moneda) }}">
                            @if($errors->has('moneda'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('moneda') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.reserva.fields.moneda_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="tasa_de_cambio">{{ trans('cruds.reserva.fields.tasa_de_cambio') }}</label>
                            <input class="form-control" type="number" name="tasa_de_cambio" id="tasa_de_cambio" value="{{ old('tasa_de_cambio', $reserva->tasa_de_cambio) }}" step="0.01">
                            @if($errors->has('tasa_de_cambio'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('tasa_de_cambio') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.reserva.fields.tasa_de_cambio_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="fecha_reserva">{{ trans('cruds.reserva.fields.fecha_reserva') }}</label>
                            <input class="form-control date" type="text" name="fecha_reserva" id="fecha_reserva" value="{{ old('fecha_reserva', $reserva->fecha_reserva) }}" required>
                            @if($errors->has('fecha_reserva'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('fecha_reserva') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.reserva.fields.fecha_reserva_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="prestado_de_servicio_id">{{ trans('cruds.reserva.fields.prestado_de_servicio') }}</label>
                            <select class="form-control select2" name="prestado_de_servicio_id" id="prestado_de_servicio_id">
                                @foreach($prestado_de_servicios as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('prestado_de_servicio_id') ? old('prestado_de_servicio_id') : $reserva->prestado_de_servicio->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('prestado_de_servicio'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('prestado_de_servicio') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.reserva.fields.prestado_de_servicio_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="estatus_reserva_id">{{ trans('cruds.reserva.fields.estatus_reserva') }}</label>
                            <select class="form-control select2" name="estatus_reserva_id" id="estatus_reserva_id">
                                @foreach($estatus_reservas as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('estatus_reserva_id') ? old('estatus_reserva_id') : $reserva->estatus_reserva->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('estatus_reserva'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('estatus_reserva') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.reserva.fields.estatus_reserva_helper') }}</span>
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