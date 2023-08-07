@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.banner.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.banners.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.banner.fields.id') }}
                        </th>
                        <td>
                            {{ $banner->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.banner.fields.imagen') }}
                        </th>
                        <td>
                            @if($banner->imagen)
                                <a href="{{ $banner->imagen->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $banner->imagen->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.banner.fields.url') }}
                        </th>
                        <td>
                            {{ $banner->url }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.banner.fields.target') }}
                        </th>
                        <td>
                            {{ $banner->target }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.banner.fields.titulo') }}
                        </th>
                        <td>
                            {{ $banner->titulo }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.banner.fields.html') }}
                        </th>
                        <td>
                            {!! $banner->html !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.banner.fields.ubicacion') }}
                        </th>
                        <td>
                            {{ App\Models\Banner::UBICACION_SELECT[$banner->ubicacion] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.banner.fields.orden') }}
                        </th>
                        <td>
                            {{ $banner->orden }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.banner.fields.estatus') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $banner->estatus ? 'checked' : '' }}>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.banners.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection