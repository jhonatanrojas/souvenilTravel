@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @can('prestadores_de_servicio_create')
                <div style="margin-bottom: 10px;" class="row">
                    <div class="col-lg-12">
                        <a class="btn btn-success" href="{{ route('frontend.prestadores-de-servicios.create') }}">
                            {{ trans('global.add') }} {{ trans('cruds.prestadoresDeServicio.title_singular') }}
                        </a>
                    </div>
                </div>
            @endcan
            <div class="card">
                <div class="card-header">
                    {{ trans('cruds.prestadoresDeServicio.title_singular') }} {{ trans('global.list') }}
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-PrestadoresDeServicio">
                            <thead>
                                <tr>
                                    <th>
                                        {{ trans('cruds.prestadoresDeServicio.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.prestadoresDeServicio.fields.nombre_razon_social') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.prestadoresDeServicio.fields.direccion') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.prestadoresDeServicio.fields.telefono') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.prestadoresDeServicio.fields.telefono_2') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.prestadoresDeServicio.fields.nombre_representate') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.prestadoresDeServicio.fields.email') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.prestadoresDeServicio.fields.password') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.prestadoresDeServicio.fields.estado') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.prestadoresDeServicio.fields.municipio') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.prestadoresDeServicio.fields.user_regiter') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                                <tr>
                                    <td>
                                    </td>
                                    <td>
                                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                    </td>
                                    <td>
                                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                    </td>
                                    <td>
                                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                    </td>
                                    <td>
                                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                    </td>
                                    <td>
                                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                    </td>
                                    <td>
                                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                    </td>
                                    <td>
                                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                    </td>
                                    <td>
                                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                    </td>
                                    <td>
                                        <select class="search">
                                            <option value>{{ trans('global.all') }}</option>
                                            @foreach($estados as $key => $item)
                                                <option value="{{ $item->nombre }}">{{ $item->nombre }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        <select class="search">
                                            <option value>{{ trans('global.all') }}</option>
                                            @foreach($municipios as $key => $item)
                                                <option value="{{ $item->nombre }}">{{ $item->nombre }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        <select class="search">
                                            <option value>{{ trans('global.all') }}</option>
                                            @foreach($users as $key => $item)
                                                <option value="{{ $item->name }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                    </td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($prestadoresDeServicios as $key => $prestadoresDeServicio)
                                    <tr data-entry-id="{{ $prestadoresDeServicio->id }}">
                                        <td>
                                            {{ $prestadoresDeServicio->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $prestadoresDeServicio->nombre_razon_social ?? '' }}
                                        </td>
                                        <td>
                                            {{ $prestadoresDeServicio->direccion ?? '' }}
                                        </td>
                                        <td>
                                            {{ $prestadoresDeServicio->telefono ?? '' }}
                                        </td>
                                        <td>
                                            {{ $prestadoresDeServicio->telefono_2 ?? '' }}
                                        </td>
                                        <td>
                                            {{ $prestadoresDeServicio->nombre_representate ?? '' }}
                                        </td>
                                        <td>
                                            {{ $prestadoresDeServicio->email ?? '' }}
                                        </td>
                                        <td>
                                            {{ $prestadoresDeServicio->password ?? '' }}
                                        </td>
                                        <td>
                                            {{ $prestadoresDeServicio->estado->nombre ?? '' }}
                                        </td>
                                        <td>
                                            {{ $prestadoresDeServicio->municipio->nombre ?? '' }}
                                        </td>
                                        <td>
                                            {{ $prestadoresDeServicio->user_regiter->name ?? '' }}
                                        </td>
                                        <td>
                                            @can('prestadores_de_servicio_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('frontend.prestadores-de-servicios.show', $prestadoresDeServicio->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('prestadores_de_servicio_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('frontend.prestadores-de-servicios.edit', $prestadoresDeServicio->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan


                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
  
  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 50,
  });
  let table = $('.datatable-PrestadoresDeServicio:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
let visibleColumnsIndexes = null;
$('.datatable thead').on('input', '.search', function () {
      let strict = $(this).attr('strict') || false
      let value = strict && this.value ? "^" + this.value + "$" : this.value

      let index = $(this).parent().index()
      if (visibleColumnsIndexes !== null) {
        index = visibleColumnsIndexes[index]
      }

      table
        .column(index)
        .search(value, strict)
        .draw()
  });
table.on('column-visibility.dt', function(e, settings, column, state) {
      visibleColumnsIndexes = []
      table.columns(":visible").every(function(colIdx) {
          visibleColumnsIndexes.push(colIdx);
      });
  })
})

</script>
@endsection