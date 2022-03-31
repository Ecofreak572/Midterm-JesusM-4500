@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.itemManufacturer.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.item-manufacturers.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.itemManufacturer.fields.id') }}
                        </th>
                        <td>
                            {{ $itemManufacturer->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.itemManufacturer.fields.name') }}
                        </th>
                        <td>
                            {{ $itemManufacturer->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.itemManufacturer.fields.contactinfo') }}
                        </th>
                        <td>
                            {{ $itemManufacturer->contactinfo }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.itemManufacturer.fields.address') }}
                        </th>
                        <td>
                            {{ $itemManufacturer->address }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.itemManufacturer.fields.sales_contact_info') }}
                        </th>
                        <td>
                            {{ $itemManufacturer->sales_contact_info }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.itemManufacturer.fields.tech_support_contact_info') }}
                        </th>
                        <td>
                            {{ $itemManufacturer->tech_support_contact_info }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.item-manufacturers.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection