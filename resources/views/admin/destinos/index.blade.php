@extends('layouts.admin')
@section('content')
@can('destino_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.destinos.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.destino.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.destino.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Destino">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.destino.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.destino.fields.codigo_municipio') }}
                        </th>
                        <th>
                            {{ trans('cruds.municipio.fields.nombre') }}
                        </th>
                        <th>
                            {{ trans('cruds.destino.fields.codigo_estado') }}
                        </th>
                        <th>
                            {{ trans('cruds.estado.fields.codigoestado') }}
                        </th>
                        <th>
                            {{ trans('cruds.destino.fields.nombre') }}
                        </th>
                        <th>
                            {{ trans('cruds.destino.fields.fhotos') }}
                        </th>
                        <th>
                            {{ trans('cruds.destino.fields.nombre_eje') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($destinos as $key => $destino)
                        <tr data-entry-id="{{ $destino->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $destino->id ?? '' }}
                            </td>
                            <td>
                                {{ $destino->codigo_municipio->codigo_municipio ?? '' }}
                            </td>
                            <td>
                                {{ $destino->codigo_municipio->nombre ?? '' }}
                            </td>
                            <td>
                                {{ $destino->codigo_estado->nombre ?? '' }}
                            </td>
                            <td>
                                {{ $destino->codigo_estado->codigoestado ?? '' }}
                            </td>
                            <td>
                                {{ $destino->nombre ?? '' }}
                            </td>
                            <td>
                                @foreach($destino->fhotos as $key => $media)
                                    <a href="{{ $media->getUrl() }}" target="_blank" style="display: inline-block">
                                        <img src="{{ $media->getUrl('thumb') }}">
                                    </a>
                                @endforeach
                            </td>
                            <td>
                                {{ $destino->nombre_eje ?? '' }}
                            </td>
                            <td>
                                @can('destino_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.destinos.show', $destino->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('destino_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.destinos.edit', $destino->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('destino_delete')
                                    <form action="{{ route('admin.destinos.destroy', $destino->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('destino_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.destinos.massDestroy') }}",
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
  let table = $('.datatable-Destino:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection