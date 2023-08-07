@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.detalleDeReserva.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.detalle-de-reservas.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.detalleDeReserva.fields.id') }}
                        </th>
                        <td>
                            {{ $detalleDeReserva->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.detalleDeReserva.fields.reserva') }}
                        </th>
                        <td>
                            {{ $detalleDeReserva->reserva->nro_reserva ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.detalleDeReserva.fields.producto') }}
                        </th>
                        <td>
                            {{ $detalleDeReserva->producto->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.detalleDeReserva.fields.cant_adultos') }}
                        </th>
                        <td>
                            {{ $detalleDeReserva->cant_adultos }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.detalleDeReserva.fields.cant_ninos') }}
                        </th>
                        <td>
                            {{ $detalleDeReserva->cant_ninos }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.detalleDeReserva.fields.fecha_desde') }}
                        </th>
                        <td>
                            {{ $detalleDeReserva->fecha_desde }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.detalleDeReserva.fields.fecha_hasta') }}
                        </th>
                        <td>
                            {{ $detalleDeReserva->fecha_hasta }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.detalleDeReserva.fields.moneda') }}
                        </th>
                        <td>
                            {{ $detalleDeReserva->moneda }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.detalleDeReserva.fields.tasa_de_cambio') }}
                        </th>
                        <td>
                            {{ $detalleDeReserva->tasa_de_cambio }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.detalleDeReserva.fields.precio') }}
                        </th>
                        <td>
                            {{ $detalleDeReserva->precio }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.detalleDeReserva.fields.total') }}
                        </th>
                        <td>
                            {{ $detalleDeReserva->total }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.detalle-de-reservas.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection