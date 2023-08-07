@can('municipio_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.municipios.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.municipio.title_singular') }}
            </a>
        </div>
    </div>
@endcan

<div class="card">
    <div class="card-header">
        {{ trans('cruds.municipio.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-codigoEstadoMunicipios">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.municipio.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.municipio.fields.codigo_municipio') }}
                        </th>
                        <th>
                            {{ trans('cruds.municipio.fields.codigo_estado') }}
                        </th>
                        <th>
                            {{ trans('cruds.estado.fields.codigoestado') }}
                        </th>
                        <th>
                            {{ trans('cruds.municipio.fields.nombre') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($municipios as $key => $municipio)
                        <tr data-entry-id="{{ $municipio->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $municipio->id ?? '' }}
                            </td>
                            <td>
                                {{ $municipio->codigo_municipio ?? '' }}
                            </td>
                            <td>
                                {{ $municipio->codigo_estado->nombre ?? '' }}
                            </td>
                            <td>
                                {{ $municipio->codigo_estado->codigoestado ?? '' }}
                            </td>
                            <td>
                                {{ $municipio->nombre ?? '' }}
                            </td>
                            <td>
                                @can('municipio_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.municipios.show', $municipio->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('municipio_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.municipios.edit', $municipio->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('municipio_delete')
                                    <form action="{{ route('admin.municipios.destroy', $municipio->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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

@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('municipio_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.municipios.massDestroy') }}",
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
  let table = $('.datatable-codigoEstadoMunicipios:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection