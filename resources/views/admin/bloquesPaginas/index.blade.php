@extends('layouts.admin')
@section('content')
@can('bloques_pagina_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.bloques-paginas.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.bloquesPagina.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.bloquesPagina.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-BloquesPagina">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.bloquesPagina.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.bloquesPagina.fields.nombre') }}
                        </th>
                        <th>
                            {{ trans('cruds.bloquesPagina.fields.posicion') }}
                        </th>
                        <th>
                            {{ trans('cruds.bloquesPagina.fields.pagina') }}
                        </th>
                        <th>
                            {{ trans('cruds.bloquesPagina.fields.tipo') }}
                        </th>
                        <th>
                            {{ trans('cruds.bloquesPagina.fields.orden') }}
                        </th>
                        <th>
                            {{ trans('cruds.bloquesPagina.fields.estatus') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($bloquesPaginas as $key => $bloquesPagina)
                        <tr data-entry-id="{{ $bloquesPagina->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $bloquesPagina->id ?? '' }}
                            </td>
                            <td>
                                {{ $bloquesPagina->nombre ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\BloquesPagina::POSICION_SELECT[$bloquesPagina->posicion] ?? '' }}
                            </td>
                            <td>
                                {{ $bloquesPagina->pagina ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\BloquesPagina::TIPO_SELECT[$bloquesPagina->tipo] ?? '' }}
                            </td>
                            <td>
                                {{ $bloquesPagina->orden ?? '' }}
                            </td>
                            <td>
                                <span style="display:none">{{ $bloquesPagina->estatus ?? '' }}</span>
                                <input type="checkbox" disabled="disabled" {{ $bloquesPagina->estatus ? 'checked' : '' }}>
                            </td>
                            <td>
                                @can('bloques_pagina_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.bloques-paginas.show', $bloquesPagina->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('bloques_pagina_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.bloques-paginas.edit', $bloquesPagina->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('bloques_pagina_delete')
                                    <form action="{{ route('admin.bloques-paginas.destroy', $bloquesPagina->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('bloques_pagina_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.bloques-paginas.massDestroy') }}",
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
  let table = $('.datatable-BloquesPagina:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection