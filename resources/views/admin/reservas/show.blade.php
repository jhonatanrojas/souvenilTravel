@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.reserva.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.reservas.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.reserva.fields.id') }}
                        </th>
                        <td>
                            {{ $reserva->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.reserva.fields.nro_reserva') }}
                        </th>
                        <td>
                            {{ $reserva->nro_reserva }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.reserva.fields.cliente') }}
                        </th>
                        <td>
                            {{ $reserva->cliente->nombres ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.reserva.fields.subtotal') }}
                        </th>
                        <td>
                            {{ $reserva->subtotal }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.reserva.fields.total') }}
                        </th>
                        <td>
                            {{ $reserva->total }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.reserva.fields.moneda') }}
                        </th>
                        <td>
                            {{ $reserva->moneda }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.reserva.fields.tasa_de_cambio') }}
                        </th>
                        <td>
                            {{ $reserva->tasa_de_cambio }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.reserva.fields.fecha_reserva') }}
                        </th>
                        <td>
                            {{ $reserva->fecha_reserva }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.reserva.fields.prestado_de_servicio') }}
                        </th>
                        <td>
                            {{ $reserva->prestado_de_servicio->nombre_razon_social ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.reserva.fields.estatus_reserva') }}
                        </th>
                        <td>
                            {{ $reserva->estatus_reserva->descripcion ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.reservas.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection