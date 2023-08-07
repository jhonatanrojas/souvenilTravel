@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.edit') }} {{ trans('cruds.pago.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.pagos.update", [$pago->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label for="reserva_id">{{ trans('cruds.pago.fields.reserva') }}</label>
                            <select class="form-control select2" name="reserva_id" id="reserva_id">
                                @foreach($reservas as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('reserva_id') ? old('reserva_id') : $pago->reserva->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('reserva'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('reserva') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.pago.fields.reserva_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="monto">{{ trans('cruds.pago.fields.monto') }}</label>
                            <input class="form-control" type="number" name="monto" id="monto" value="{{ old('monto', $pago->monto) }}" step="0.01" required>
                            @if($errors->has('monto'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('monto') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.pago.fields.monto_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="moneda">{{ trans('cruds.pago.fields.moneda') }}</label>
                            <input class="form-control" type="text" name="moneda" id="moneda" value="{{ old('moneda', $pago->moneda) }}">
                            @if($errors->has('moneda'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('moneda') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.pago.fields.moneda_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="tasa_de_cambio">{{ trans('cruds.pago.fields.tasa_de_cambio') }}</label>
                            <input class="form-control" type="number" name="tasa_de_cambio" id="tasa_de_cambio" value="{{ old('tasa_de_cambio', $pago->tasa_de_cambio) }}" step="0.01">
                            @if($errors->has('tasa_de_cambio'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('tasa_de_cambio') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.pago.fields.tasa_de_cambio_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="fecha_de_pago">{{ trans('cruds.pago.fields.fecha_de_pago') }}</label>
                            <input class="form-control date" type="text" name="fecha_de_pago" id="fecha_de_pago" value="{{ old('fecha_de_pago', $pago->fecha_de_pago) }}">
                            @if($errors->has('fecha_de_pago'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('fecha_de_pago') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.pago.fields.fecha_de_pago_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="forma_de_pago">{{ trans('cruds.pago.fields.forma_de_pago') }}</label>
                            <input class="form-control" type="text" name="forma_de_pago" id="forma_de_pago" value="{{ old('forma_de_pago', $pago->forma_de_pago) }}">
                            @if($errors->has('forma_de_pago'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('forma_de_pago') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.pago.fields.forma_de_pago_helper') }}</span>
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