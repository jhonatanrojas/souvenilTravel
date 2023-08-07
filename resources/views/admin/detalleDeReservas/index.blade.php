@extends('layouts.admin')
@section('content')
@can('detalle_de_reserva_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.detalle-de-reservas.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.detalleDeReserva.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.detalleDeReserva.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-DetalleDeReserva">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.detalleDeReserva.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.detalleDeReserva.fields.reserva') }}
                        </th>
                        <th>
                            {{ trans('cruds.detalleDeReserva.fields.producto') }}
                        </th>
                        <th>
                            {{ trans('cruds.detalleDeReserva.fields.cant_adultos') }}
                        </th>
                        <th>
                            {{ trans('cruds.detalleDeReserva.fields.cant_ninos') }}
                        </th>
                        <th>
                            {{ trans('cruds.detalleDeReserva.fields.fecha_desde') }}
                        </th>
                        <th>
                            {{ trans('cruds.detalleDeReserva.fields.fecha_hasta') }}
                        </th>
                        <th>
                            {{ trans('cruds.detalleDeReserva.fields.moneda') }}
                        </th>
                        <th>
                            {{ trans('cruds.detalleDeReserva.fields.tasa_de_cambio') }}
                        </th>
                        <th>
                            {{ trans('cruds.detalleDeReserva.fields.precio') }}
                        </th>
                        <th>
                            {{ trans('cruds.detalleDeReserva.fields.total') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($detalleDeReservas as $key => $detalleDeReserva)
                        <tr data-entry-id="{{ $detalleDeReserva->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $detalleDeReserva->id ?? '' }}
                            </td>
                            <td>
                                {{ $detalleDeReserva->reserva->nro_reserva ?? '' }}
                            </td>
                            <td>
                                {{ $detalleDeReserva->producto->name ?? '' }}
                            </td>
                            <td>
                                {{ $detalleDeReserva->cant_adultos ?? '' }}
                            </td>
                            <td>
                                {{ $detalleDeReserva->cant_ninos ?? '' }}
                            </td>
                            <td>
                                {{ $detalleDeReserva->fecha_desde ?? '' }}
                            </td>
                            <td>
                                {{ $detalleDeReserva->fecha_hasta ?? '' }}
                            </td>
                            <td>
                                {{ $detalleDeReserva->moneda ?? '' }}
                            </td>
                            <td>
                                {{ $detalleDeReserva->tasa_de_cambio ?? '' }}
                            </td>
                            <td>
                                {{ $detalleDeReserva->precio ?? '' }}
                            </td>
                            <td>
                                {{ $detalleDeReserva->total ?? '' }}
                            </td>
                            <td>
                                @can('detalle_de_reserva_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.detalle-de-reservas.show', $detalleDeReserva->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('detalle_de_reserva_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.detalle-de-reservas.edit', $detalleDeReserva->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('detalle_de_reserva_delete')
                                    <form action="{{ route('admin.detalle-de-reservas.destroy', $detalleDeReserva->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('detalle_de_reserva_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.detalle-de-reservas.massDestroy') }}",
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
  let table = $('.datatable-DetalleDeReserva:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection