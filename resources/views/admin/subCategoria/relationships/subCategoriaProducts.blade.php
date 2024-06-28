@can('product_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.products.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.product.title_singular') }}
            </a>
        </div>
    </div>
@endcan

<div class="card">
    <div class="card-header">
        {{ trans('cruds.product.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-subCategoriaProducts">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.product.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.product.fields.prestador_servicio') }}
                        </th>
                        <th>
                            {{ trans('cruds.product.fields.name') }}
                        </th>
                        <th>
                            {{ trans('cruds.product.fields.estado') }}
                        </th>
                        <th>
                            {{ trans('cruds.estado.fields.nombre') }}
                        </th>
                        <th>
                            {{ trans('cruds.product.fields.nro_adultos') }}
                        </th>
                        <th>
                            {{ trans('cruds.product.fields.nro_ninos') }}
                        </th>
                        <th>
                            {{ trans('cruds.product.fields.destino') }}
                        </th>
                        <th>
                            {{ trans('cruds.product.fields.direccion') }}
                        </th>
                        <th>
                            {{ trans('cruds.product.fields.diponible_desde') }}
                        </th>
                        <th>
                            {{ trans('cruds.product.fields.disponible_hasta') }}
                        </th>
                        <th>
                            {{ trans('cruds.product.fields.price') }}
                        </th>
                        <th>
                            {{ trans('cruds.product.fields.estatus') }}
                        </th>
                        <th>
                            {{ trans('cruds.product.fields.tag') }}
                        </th>
                        <th>
                            {{ trans('cruds.product.fields.photo') }}
                        </th>
                        <th>
                            {{ trans('cruds.product.fields.latitud') }}
                        </th>
                        <th>
                            {{ trans('cruds.product.fields.logitud') }}
                        </th>
                        <th>
                            {{ trans('cruds.product.fields.category') }}
                        </th>
                        <th>
                            {{ trans('cruds.product.fields.sub_categoria') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $key => $product)
                        <tr data-entry-id="{{ $product->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $product->id ?? '' }}
                            </td>
                            <td>
                                @foreach($product->prestador_servicios as $key => $item)
                                    <span class="badge badge-info">{{ $item->nombre_razon_social }}</span>
                                @endforeach
                            </td>
                            <td>
                                {{ $product->name ?? '' }}
                            </td>
                            <td>
                                {{ $product->estado->nombre ?? '' }}
                            </td>
                            <td>
                                {{ $product->estado->nombre ?? '' }}
                            </td>
                            <td>
                                {{ $product->nro_adultos ?? '' }}
                            </td>
                            <td>
                                {{ $product->nro_ninos ?? '' }}
                            </td>
                            <td>
                                {{ $product->destino->nombre ?? '' }}
                            </td>
                            <td>
                                {{ $product->direccion ?? '' }}
                            </td>
                            <td>
                                {{ $product->diponible_desde ?? '' }}
                            </td>
                            <td>
                                {{ $product->disponible_hasta ?? '' }}
                            </td>
                            <td>
                                {{ $product->price ?? '' }}
                            </td>
                            <td>
                                <span style="display:none">{{ $product->estatus ?? '' }}</span>
                                <input type="checkbox" disabled="disabled" {{ $product->estatus ? 'checked' : '' }}>
                            </td>
                            <td>
                                @foreach($product->tags as $key => $item)
                                    <span class="badge badge-info">{{ $item->name }}</span>
                                @endforeach
                            </td>
                            <td>
                                @foreach($product->photo as $key => $media)
                                    <a href="{{ $media->getUrl() }}" target="_blank" style="display: inline-block">
                                        <img src="{{ $media->getUrl('thumb') }}">
                                    </a>
                                @endforeach
                            </td>
                            <td>
                                {{ $product->latitud ?? '' }}
                            </td>
                            <td>
                                {{ $product->logitud ?? '' }}
                            </td>
                            <td>
                                {{ $product->category->name ?? '' }}
                            </td>
                            <td>
                                {{ $product->sub_categoria->nombre ?? '' }}
                            </td>
                            <td>
                                @can('product_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.products.show', $product->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('product_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.products.edit', $product->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('product_delete')
                                    <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('product_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.products.massDestroy') }}",
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
  let table = $('.datatable-subCategoriaProducts:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection