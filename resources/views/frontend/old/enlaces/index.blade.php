@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @can('enlace_create')
                <div style="margin-bottom: 10px;" class="row">
                    <div class="col-lg-12">
                        <a class="btn btn-success" href="{{ route('frontend.enlaces.create') }}">
                            {{ trans('global.add') }} {{ trans('cruds.enlace.title_singular') }}
                        </a>
                    </div>
                </div>
            @endcan
            <div class="card">
                <div class="card-header">
                    {{ trans('cruds.enlace.title_singular') }} {{ trans('global.list') }}
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-Enlace">
                            <thead>
                                <tr>
                                    <th>
                                        {{ trans('cruds.enlace.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.enlace.fields.nombre') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.enlace.fields.url') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.enlace.fields.target') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.enlace.fields.grupo') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($enlaces as $key => $enlace)
                                    <tr data-entry-id="{{ $enlace->id }}">
                                        <td>
                                            {{ $enlace->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $enlace->nombre ?? '' }}
                                        </td>
                                        <td>
                                            {{ $enlace->url ?? '' }}
                                        </td>
                                        <td>
                                            {{ App\Models\Enlace::TARGET_SELECT[$enlace->target] ?? '' }}
                                        </td>
                                        <td>
                                            {{ App\Models\Enlace::GRUPO_SELECT[$enlace->grupo] ?? '' }}
                                        </td>
                                        <td>
                                            @can('enlace_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('frontend.enlaces.show', $enlace->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('enlace_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('frontend.enlaces.edit', $enlace->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('enlace_delete')
                                                <form action="{{ route('frontend.enlaces.destroy', $enlace->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('enlace_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('frontend.enlaces.massDestroy') }}",
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
  let table = $('.datatable-Enlace:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection