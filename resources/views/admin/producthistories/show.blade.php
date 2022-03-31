@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.producthistory.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.producthistories.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.producthistory.fields.id') }}
                        </th>
                        <td>
                            {{ $producthistory->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.producthistory.fields.services') }}
                        </th>
                        <td>
                            {{ $producthistory->services }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.producthistory.fields.software') }}
                        </th>
                        <td>
                            {{ $producthistory->software }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.producthistory.fields.item_name') }}
                        </th>
                        <td>
                            @foreach($producthistory->item_names as $key => $item_name)
                                <span class="label label-info">{{ $item_name->invoice }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.producthistory.fields.item_name_1') }}
                        </th>
                        <td>
                            @foreach($producthistory->item_name_1s as $key => $item_name_1)
                                <span class="label label-info">{{ $item_name_1->invoice }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.producthistory.fields.item_name_2') }}
                        </th>
                        <td>
                            @foreach($producthistory->item_name_2s as $key => $item_name_2)
                                <span class="label label-info">{{ $item_name_2->invoice }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.producthistory.fields.item_name_3') }}
                        </th>
                        <td>
                            @foreach($producthistory->item_name_3s as $key => $item_name_3)
                                <span class="label label-info">{{ $item_name_3->invoice }}</span>
                            @endforeach
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.producthistories.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection