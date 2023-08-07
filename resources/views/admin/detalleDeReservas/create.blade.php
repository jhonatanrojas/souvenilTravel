@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.detalleDeReserva.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.detalle-de-reservas.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="reserva_id">{{ trans('cruds.detalleDeReserva.fields.reserva') }}</label>
                <select class="form-control select2 {{ $errors->has('reserva') ? 'is-invalid' : '' }}" name="reserva_id" id="reserva_id" required>
                    @foreach($reservas as $id => $entry)
                        <option value="{{ $id }}" {{ old('reserva_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('reserva'))
                    <div class="invalid-feedback">
                        {{ $errors->first('reserva') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.detalleDeReserva.fields.reserva_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="producto_id">{{ trans('cruds.detalleDeReserva.fields.producto') }}</label>
                <select class="form-control select2 {{ $errors->has('producto') ? 'is-invalid' : '' }}" name="producto_id" id="producto_id" required>
                    @foreach($productos as $id => $entry)
                        <option value="{{ $id }}" {{ old('producto_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('producto'))
                    <div class="invalid-feedback">
                        {{ $errors->first('producto') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.detalleDeReserva.fields.producto_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="cant_adultos">{{ trans('cruds.detalleDeReserva.fields.cant_adultos') }}</label>
                <input class="form-control {{ $errors->has('cant_adultos') ? 'is-invalid' : '' }}" type="number" name="cant_adultos" id="cant_adultos" value="{{ old('cant_adultos', '1') }}" step="1" required>
                @if($errors->has('cant_adultos'))
                    <div class="invalid-feedback">
                        {{ $errors->first('cant_adultos') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.detalleDeReserva.fields.cant_adultos_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="cant_ninos">{{ trans('cruds.detalleDeReserva.fields.cant_ninos') }}</label>
                <input class="form-control {{ $errors->has('cant_ninos') ? 'is-invalid' : '' }}" type="number" name="cant_ninos" id="cant_ninos" value="{{ old('cant_ninos', '0') }}" step="1">
                @if($errors->has('cant_ninos'))
                    <div class="invalid-feedback">
                        {{ $errors->first('cant_ninos') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.detalleDeReserva.fields.cant_ninos_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="fecha_desde">{{ trans('cruds.detalleDeReserva.fields.fecha_desde') }}</label>
                <input class="form-control date {{ $errors->has('fecha_desde') ? 'is-invalid' : '' }}" type="text" name="fecha_desde" id="fecha_desde" value="{{ old('fecha_desde') }}">
                @if($errors->has('fecha_desde'))
                    <div class="invalid-feedback">
                        {{ $errors->first('fecha_desde') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.detalleDeReserva.fields.fecha_desde_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="fecha_hasta">{{ trans('cruds.detalleDeReserva.fields.fecha_hasta') }}</label>
                <input class="form-control date {{ $errors->has('fecha_hasta') ? 'is-invalid' : '' }}" type="text" name="fecha_hasta" id="fecha_hasta" value="{{ old('fecha_hasta') }}">
                @if($errors->has('fecha_hasta'))
                    <div class="invalid-feedback">
                        {{ $errors->first('fecha_hasta') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.detalleDeReserva.fields.fecha_hasta_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="moneda">{{ trans('cruds.detalleDeReserva.fields.moneda') }}</label>
                <input class="form-control {{ $errors->has('moneda') ? 'is-invalid' : '' }}" type="text" name="moneda" id="moneda" value="{{ old('moneda', 'USD') }}">
                @if($errors->has('moneda'))
                    <div class="invalid-feedback">
                        {{ $errors->first('moneda') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.detalleDeReserva.fields.moneda_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="tasa_de_cambio">{{ trans('cruds.detalleDeReserva.fields.tasa_de_cambio') }}</label>
                <input class="form-control {{ $errors->has('tasa_de_cambio') ? 'is-invalid' : '' }}" type="number" name="tasa_de_cambio" id="tasa_de_cambio" value="{{ old('tasa_de_cambio', '1') }}" step="0.01">
                @if($errors->has('tasa_de_cambio'))
                    <div class="invalid-feedback">
                        {{ $errors->first('tasa_de_cambio') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.detalleDeReserva.fields.tasa_de_cambio_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="precio">{{ trans('cruds.detalleDeReserva.fields.precio') }}</label>
                <input class="form-control {{ $errors->has('precio') ? 'is-invalid' : '' }}" type="number" name="precio" id="precio" value="{{ old('precio', '0') }}" step="0.01" required>
                @if($errors->has('precio'))
                    <div class="invalid-feedback">
                        {{ $errors->first('precio') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.detalleDeReserva.fields.precio_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="total">{{ trans('cruds.detalleDeReserva.fields.total') }}</label>
                <input class="form-control {{ $errors->has('total') ? 'is-invalid' : '' }}" type="number" name="total" id="total" value="{{ old('total', '') }}" step="0.01" required>
                @if($errors->has('total'))
                    <div class="invalid-feedback">
                        {{ $errors->first('total') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.detalleDeReserva.fields.total_helper') }}</span>
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