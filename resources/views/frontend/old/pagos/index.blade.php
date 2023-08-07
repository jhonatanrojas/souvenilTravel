@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @can('pago_create')
                <div style="margin-bottom: 10px;" class="row">
                    <div class="col-lg-12">
                        <a class="btn btn-success" href="{{ route('frontend.pagos.create') }}">
                            {{ trans('global.add') }} {{ trans('cruds.pago.title_singular') }}
                        </a>
                    </div>
                </div>
            @endcan
            <div class="card">
                <div class="card-header">
                    {{ trans('cruds.pago.title_singular') }} {{ trans('global.list') }}
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-Pago">
                            <thead>
                                <tr>
                                    <th>
                                        {{ trans('cruds.pago.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.pago.fields.reserva') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.pago.fields.monto') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.pago.fields.moneda') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.pago.fields.tasa_de_cambio') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.pago.fields.fecha_de_pago') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.pago.fields.forma_de_pago') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($pagos as $key => $pago)
                                    <tr data-entry-id="{{ $pago->id }}">
                                        <td>
                                            {{ $pago->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $pago->reserva->nro_reserva ?? '' }}
                                        </td>
                                        <td>
                                            {{ $pago->monto ?? '' }}
                                        </td>
                                        <td>
                                            {{ $pago->moneda ?? '' }}
                                        </td>
                                        <td>
                                            {{ $pago->tasa_de_cambio ?? '' }}
                                        </td>
                                        <td>
                                            {{ $pago->fecha_de_pago ?? '' }}
                                        </td>
                                        <td>
                                            {{ $pago->forma_de_pago ?? '' }}
                                        </td>
                                        <td>
                                            @can('pago_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('frontend.pagos.show', $pago->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('pago_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('frontend.pagos.edit', $pago->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('pago_delete')
                                                <form action="{{ route('frontend.pagos.destroy', $pago->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('pago_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('frontend.pagos.massDestroy') }}",
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
  let table = $('.datatable-Pago:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection