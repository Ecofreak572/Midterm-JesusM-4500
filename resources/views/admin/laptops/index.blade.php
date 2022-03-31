@extends('layouts.admin')
@section('content')
@can('laptop_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.laptops.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.laptop.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.laptop.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Laptop">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.laptop.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.laptop.fields.name') }}
                        </th>
                        <th>
                            {{ trans('cruds.laptop.fields.user') }}
                        </th>
                        <th>
                            {{ trans('cruds.laptop.fields.model') }}
                        </th>
                        <th>
                            {{ trans('cruds.laptop.fields.year') }}
                        </th>
                        <th>
                            {{ trans('cruds.laptop.fields.date') }}
                        </th>
                        <th>
                            {{ trans('cruds.laptop.fields.invoice') }}
                        </th>
                        <th>
                            {{ trans('cruds.laptop.fields.price') }}
                        </th>
                        <th>
                            {{ trans('cruds.laptop.fields.hardware_specs') }}
                        </th>
                        <th>
                            {{ trans('cruds.laptop.fields.manufacturer') }}
                        </th>
                        <th>
                            {{ trans('cruds.laptop.fields.services') }}
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
                    @foreach($laptops as $key => $laptop)
                        <tr data-entry-id="{{ $laptop->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $laptop->id ?? '' }}
                            </td>
                            <td>
                                {{ $laptop->name ?? '' }}
                            </td>
                            <td>
                                {{ $laptop->user->name ?? '' }}
                            </td>
                            <td>
                                {{ $laptop->model ?? '' }}
                            </td>
                            <td>
                                {{ $laptop->year ?? '' }}
                            </td>
                            <td>
                                {{ $laptop->date ?? '' }}
                            </td>
                            <td>
                                {{ $laptop->invoice ?? '' }}
                            </td>
                            <td>
                                {{ $laptop->price ?? '' }}
                            </td>
                            <td>
                                {{ $laptop->hardware_specs ?? '' }}
                            </td>
                            <td>
                                {{ $laptop->manufacturer->contactinfo ?? '' }}
                            </td>
                            <td>
                                {{ $laptop->services->services ?? '' }}
                            </td>
                            <td>
                                {{ $laptop->services->software ?? '' }}
                            </td>
                            <td>
                                @can('laptop_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.laptops.show', $laptop->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('laptop_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.laptops.edit', $laptop->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('laptop_delete')
                                    <form action="{{ route('admin.laptops.destroy', $laptop->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('laptop_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.laptops.massDestroy') }}",
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
  let table = $('.datatable-Laptop:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection