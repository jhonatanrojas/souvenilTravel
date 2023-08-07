@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.pago.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.pagos.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.pago.fields.id') }}
                        </th>
                        <td>
                            {{ $pago->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pago.fields.reserva') }}
                        </th>
                        <td>
                            {{ $pago->reserva->nro_reserva ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pago.fields.monto') }}
                        </th>
                        <td>
                            {{ $pago->monto }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pago.fields.moneda') }}
                        </th>
                        <td>
                            {{ $pago->moneda }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pago.fields.tasa_de_cambio') }}
                        </th>
                        <td>
                            {{ $pago->tasa_de_cambio }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pago.fields.fecha_de_pago') }}
                        </th>
                        <td>
                            {{ $pago->fecha_de_pago }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pago.fields.forma_de_pago') }}
                        </th>
                        <td>
                            {{ $pago->forma_de_pago }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.pagos.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection