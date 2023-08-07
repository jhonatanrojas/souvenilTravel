@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.show') }} {{ trans('cruds.product.title') }}
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.products.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.product.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $product->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.product.fields.prestador_servicio') }}
                                    </th>
                                    <td>
                                        @foreach($product->prestador_servicios as $key => $prestador_servicio)
                                            <span class="label label-info">{{ $prestador_servicio->nombre_razon_social }}</span>
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.product.fields.name') }}
                                    </th>
                                    <td>
                                        {{ $product->name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.product.fields.description') }}
                                    </th>
                                    <td>
                                        {!! $product->description !!}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.product.fields.estado') }}
                                    </th>
                                    <td>
                                        {{ $product->estado->nombre ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.product.fields.nro_adultos') }}
                                    </th>
                                    <td>
                                        {{ $product->nro_adultos }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.product.fields.nro_ninos') }}
                                    </th>
                                    <td>
                                        {{ $product->nro_ninos }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.product.fields.destino') }}
                                    </th>
                                    <td>
                                        {{ $product->destino->nombre ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.product.fields.direccion') }}
                                    </th>
                                    <td>
                                        {{ $product->direccion }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.product.fields.diponible_desde') }}
                                    </th>
                                    <td>
                                        {{ $product->diponible_desde }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.product.fields.disponible_hasta') }}
                                    </th>
                                    <td>
                                        {{ $product->disponible_hasta }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.product.fields.price') }}
                                    </th>
                                    <td>
                                        {{ $product->price }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.product.fields.estatus') }}
                                    </th>
                                    <td>
                                        <input type="checkbox" disabled="disabled" {{ $product->estatus ? 'checked' : '' }}>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.product.fields.tag') }}
                                    </th>
                                    <td>
                                        @foreach($product->tags as $key => $tag)
                                            <span class="label label-info">{{ $tag->name }}</span>
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.product.fields.photo') }}
                                    </th>
                                    <td>
                                        @foreach($product->photo as $key => $media)
                                            <a href="{{ $media->getUrl() }}" target="_blank" style="display: inline-block">
                                                <img src="{{ $media->getUrl('thumb') }}">
                                            </a>
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.product.fields.latitud') }}
                                    </th>
                                    <td>
                                        {{ $product->latitud }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.product.fields.logitud') }}
                                    </th>
                                    <td>
                                        {{ $product->logitud }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.product.fields.category') }}
                                    </th>
                                    <td>
                                        {{ $product->category->name ?? '' }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.products.index') }}">
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