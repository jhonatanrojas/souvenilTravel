@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @can('reserva_create')
                <div style="margin-bottom: 10px;" class="row">
                    <div class="col-lg-12">
                        <a class="btn btn-success" href="{{ route('frontend.reservas.create') }}">
                            {{ trans('global.add') }} {{ trans('cruds.reserva.title_singular') }}
                        </a>
                    </div>
                </div>
            @endcan
            <div class="card">
                <div class="card-header">
                    {{ trans('cruds.reserva.title_singular') }} {{ trans('global.list') }}
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-Reserva">
                            <thead>
                                <tr>
                                    <th>
                                        {{ trans('cruds.reserva.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.reserva.fields.nro_reserva') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.reserva.fields.cliente') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.cliente.fields.apellidos') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.reserva.fields.subtotal') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.reserva.fields.total') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.reserva.fields.moneda') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.reserva.fields.tasa_de_cambio') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.reserva.fields.fecha_reserva') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.reserva.fields.prestado_de_servicio') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.reserva.fields.estatus_reserva') }}
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
                                        <select class="search">
                                            <option value>{{ trans('global.all') }}</option>
                                            @foreach($clientes as $key => $item)
                                                <option value="{{ $item->nombres }}">{{ $item->nombres }}</option>
                                            @endforeach
                                        </select>
                                    </td>
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
                                    </td>
                                    <td>
                                        <select class="search">
                                            <option value>{{ trans('global.all') }}</option>
                                            @foreach($prestadores_de_servicios as $key => $item)
                                                <option value="{{ $item->nombre_razon_social }}">{{ $item->nombre_razon_social }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        <select class="search">
                                            <option value>{{ trans('global.all') }}</option>
                                            @foreach($estatus_reservas as $key => $item)
                                                <option value="{{ $item->descripcion }}">{{ $item->descripcion }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                    </td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($reservas as $key => $reserva)
                                    <tr data-entry-id="{{ $reserva->id }}">
                                        <td>
                                            {{ $reserva->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $reserva->nro_reserva ?? '' }}
                                        </td>
                                        <td>
                                            {{ $reserva->cliente->nombres ?? '' }}
                                        </td>
                                        <td>
                                            {{ $reserva->cliente->apellidos ?? '' }}
                                        </td>
                                        <td>
                                            {{ $reserva->subtotal ?? '' }}
                                        </td>
                                        <td>
                                            {{ $reserva->total ?? '' }}
                                        </td>
                                        <td>
                                            {{ $reserva->moneda ?? '' }}
                                        </td>
                                        <td>
                                            {{ $reserva->tasa_de_cambio ?? '' }}
                                        </td>
                                        <td>
                                            {{ $reserva->fecha_reserva ?? '' }}
                                        </td>
                                        <td>
                                            {{ $reserva->prestado_de_servicio->nombre_razon_social ?? '' }}
                                        </td>
                                        <td>
                                            {{ $reserva->estatus_reserva->descripcion ?? '' }}
                                        </td>
                                        <td>
                                            @can('reserva_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('frontend.reservas.show', $reserva->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('reserva_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('frontend.reservas.edit', $reserva->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('reserva_delete')
                                                <form action="{{ route('frontend.reservas.destroy', $reserva->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                                </form>
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
@can('reserva_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('frontend.reservas.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-Reserva:not(.ajaxTable)').DataTable({ buttons: dtButtons })
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