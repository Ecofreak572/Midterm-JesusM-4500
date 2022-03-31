@extends('layouts.admin')
@section('content')
@can('tablet_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.tablets.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.tablet.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.tablet.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Tablet">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.tablet.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.tablet.fields.name') }}
                        </th>
                        <th>
                            {{ trans('cruds.tablet.fields.user') }}
                        </th>
                        <th>
                            {{ trans('cruds.tablet.fields.model') }}
                        </th>
                        <th>
                            {{ trans('cruds.tablet.fields.price') }}
                        </th>
                        <th>
                            {{ trans('cruds.tablet.fields.year') }}
                        </th>
                        <th>
                            {{ trans('cruds.tablet.fields.date') }}
                        </th>
                        <th>
                            {{ trans('cruds.tablet.fields.invoice') }}
                        </th>
                        <th>
                            {{ trans('cruds.tablet.fields.hardware_specs') }}
                        </th>
                        <th>
                            {{ trans('cruds.tablet.fields.manufacturer') }}
                        </th>
                        <th>
                            {{ trans('cruds.tablet.fields.services') }}
                        </th>
                        <th>
                            {{ trans('cruds.producthistory.fields.software') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tablets as $key => $tablet)
                        <tr data-entry-id="{{ $tablet->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $tablet->id ?? '' }}
                            </td>
                            <td>
                                {{ $tablet->name ?? '' }}
                            </td>
                            <td>
                                {{ $tablet->user->contactinfo ?? '' }}
                            </td>
                            <td>
                                {{ $tablet->model ?? '' }}
                            </td>
                            <td>
                                {{ $tablet->price ?? '' }}
                            </td>
                            <td>
                                {{ $tablet->year ?? '' }}
                            </td>
                            <td>
                                {{ $tablet->date ?? '' }}
                            </td>
                            <td>
                                {{ $tablet->invoice ?? '' }}
                            </td>
                            <td>
                                {{ $tablet->hardware_specs ?? '' }}
                            </td>
                            <td>
                                {{ $tablet->manufacturer->name ?? '' }}
                            </td>
                            <td>
                                {{ $tablet->services->services ?? '' }}
                            </td>
                            <td>
                                {{ $tablet->services->software ?? '' }}
                            </td>
                            <td>
                                @can('tablet_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.tablets.show', $tablet->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('tablet_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.tablets.edit', $tablet->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('tablet_delete')
                                    <form action="{{ route('admin.tablets.destroy', $tablet->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('tablet_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.tablets.massDestroy') }}",
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
  let table = $('.datatable-Tablet:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection