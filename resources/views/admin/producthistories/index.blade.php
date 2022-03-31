@extends('layouts.admin')
@section('content')
@can('producthistory_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.producthistories.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.producthistory.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.producthistory.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Producthistory">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.producthistory.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.producthistory.fields.services') }}
                        </th>
                        <th>
                            {{ trans('cruds.producthistory.fields.software') }}
                        </th>
                        <th>
                            {{ trans('cruds.producthistory.fields.item_name') }}
                        </th>
                        <th>
                            {{ trans('cruds.producthistory.fields.item_name_1') }}
                        </th>
                        <th>
                            {{ trans('cruds.producthistory.fields.item_name_2') }}
                        </th>
                        <th>
                            {{ trans('cruds.producthistory.fields.item_name_3') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($producthistories as $key => $producthistory)
                        <tr data-entry-id="{{ $producthistory->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $producthistory->id ?? '' }}
                            </td>
                            <td>
                                {{ $producthistory->services ?? '' }}
                            </td>
                            <td>
                                {{ $producthistory->software ?? '' }}
                            </td>
                            <td>
                                @foreach($producthistory->item_names as $key => $item)
                                    <span class="badge badge-info">{{ $item->invoice }}</span>
                                @endforeach
                            </td>
                            <td>
                                @foreach($producthistory->item_name_1s as $key => $item)
                                    <span class="badge badge-info">{{ $item->invoice }}</span>
                                @endforeach
                            </td>
                            <td>
                                @foreach($producthistory->item_name_2s as $key => $item)
                                    <span class="badge badge-info">{{ $item->invoice }}</span>
                                @endforeach
                            </td>
                            <td>
                                @foreach($producthistory->item_name_3s as $key => $item)
                                    <span class="badge badge-info">{{ $item->invoice }}</span>
                                @endforeach
                            </td>
                            <td>
                                @can('producthistory_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.producthistories.show', $producthistory->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('producthistory_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.producthistories.edit', $producthistory->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('producthistory_delete')
                                    <form action="{{ route('admin.producthistories.destroy', $producthistory->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('producthistory_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.producthistories.massDestroy') }}",
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
  let table = $('.datatable-Producthistory:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection