@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.show') }} {{ trans('cruds.prestadoresDeServicio.title') }}
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.prestadores-de-servicios.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.prestadoresDeServicio.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $prestadoresDeServicio->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.prestadoresDeServicio.fields.nombre_razon_social') }}
                                    </th>
                                    <td>
                                        {{ $prestadoresDeServicio->nombre_razon_social }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.prestadoresDeServicio.fields.direccion') }}
                                    </th>
                                    <td>
                                        {{ $prestadoresDeServicio->direccion }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.prestadoresDeServicio.fields.telefono') }}
                                    </th>
                                    <td>
                                        {{ $prestadoresDeServicio->telefono }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.prestadoresDeServicio.fields.telefono_2') }}
                                    </th>
                                    <td>
                                        {{ $prestadoresDeServicio->telefono_2 }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.prestadoresDeServicio.fields.nombre_representate') }}
                                    </th>
                                    <td>
                                        {{ $prestadoresDeServicio->nombre_representate }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.prestadoresDeServicio.fields.email') }}
                                    </th>
                                    <td>
                                        {{ $prestadoresDeServicio->email }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.prestadoresDeServicio.fields.password') }}
                                    </th>
                                    <td>
                                        {{ $prestadoresDeServicio->password }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.prestadoresDeServicio.fields.estado') }}
                                    </th>
                                    <td>
                                        {{ $prestadoresDeServicio->estado->nombre ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.prestadoresDeServicio.fields.municipio') }}
                                    </th>
                                    <td>
                                        {{ $prestadoresDeServicio->municipio->nombre ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.prestadoresDeServicio.fields.user_regiter') }}
                                    </th>
                                    <td>
                                        {{ $prestadoresDeServicio->user_regiter->name ?? '' }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.prestadores-de-servicios.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection