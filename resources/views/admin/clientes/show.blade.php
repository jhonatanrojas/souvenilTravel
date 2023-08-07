@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.cliente.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.clientes.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.cliente.fields.id') }}
                        </th>
                        <td>
                            {{ $cliente->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.cliente.fields.nombres') }}
                        </th>
                        <td>
                            {{ $cliente->nombres }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.cliente.fields.apellidos') }}
                        </th>
                        <td>
                            {{ $cliente->apellidos }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.cliente.fields.telefono') }}
                        </th>
                        <td>
                            {{ $cliente->telefono }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.cliente.fields.direccion') }}
                        </th>
                        <td>
                            {{ $cliente->direccion }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.cliente.fields.cedula') }}
                        </th>
                        <td>
                            {{ $cliente->cedula }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.cliente.fields.email') }}
                        </th>
                        <td>
                            {{ $cliente->email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.cliente.fields.password') }}
                        </th>
                        <td>
                            {{ $cliente->password }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.clientes.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection