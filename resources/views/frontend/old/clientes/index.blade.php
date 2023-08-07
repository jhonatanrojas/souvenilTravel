@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @can('cliente_create')
                <div style="margin-bottom: 10px;" class="row">
                    <div class="col-lg-12">
                        <a class="btn btn-success" href="{{ route('frontend.clientes.create') }}">
                            {{ trans('global.add') }} {{ trans('cruds.cliente.title_singular') }}
                        </a>
                    </div>
                </div>
            @endcan
            <div class="card">
                <div class="card-header">
                    {{ trans('cruds.cliente.title_singular') }} {{ trans('global.list') }}
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-Cliente">
                            <thead>
                                <tr>
                                    <th>
                                        {{ trans('cruds.cliente.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.cliente.fields.nombres') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.cliente.fields.apellidos') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.cliente.fields.telefono') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.cliente.fields.direccion') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.cliente.fields.cedula') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.cliente.fields.email') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.cliente.fields.password') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($clientes as $key => $cliente)
                                    <tr data-entry-id="{{ $cliente->id }}">
                                        <td>
                                            {{ $cliente->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $cliente->nombres ?? '' }}
                                        </td>
                                        <td>
                                            {{ $cliente->apellidos ?? '' }}
                                        </td>
                                        <td>
                                            {{ $cliente->telefono ?? '' }}
                                        </td>
                                        <td>
                                            {{ $cliente->direccion ?? '' }}
                                        </td>
                                        <td>
                                            {{ $cliente->cedula ?? '' }}
                                        </td>
                                        <td>
                                            {{ $cliente->email ?? '' }}
                                        </td>
                                        <td>
                                            {{ $cliente->password ?? '' }}
                                        </td>
                                        <td>
                                            @can('cliente_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('frontend.clientes.show', $cliente->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('cliente_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('frontend.clientes.edit', $cliente->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('cliente_delete')
                                                <form action="{{ route('frontend.clientes.destroy', $cliente->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('cliente_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('frontend.clientes.massDestroy') }}",
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
  let table = $('.datatable-Cliente:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection