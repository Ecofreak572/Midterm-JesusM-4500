@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.laptop.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.laptops.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.laptop.fields.id') }}
                        </th>
                        <td>
                            {{ $laptop->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.laptop.fields.name') }}
                        </th>
                        <td>
                            {{ $laptop->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.laptop.fields.user') }}
                        </th>
                        <td>
                            {{ $laptop->user->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.laptop.fields.model') }}
                        </th>
                        <td>
                            {{ $laptop->model }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.laptop.fields.year') }}
                        </th>
                        <td>
                            {{ $laptop->year }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.laptop.fields.date') }}
                        </th>
                        <td>
                            {{ $laptop->date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.laptop.fields.invoice') }}
                        </th>
                        <td>
                            {{ $laptop->invoice }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.laptop.fields.price') }}
                        </th>
                        <td>
                            {{ $laptop->price }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.laptop.fields.hardware_specs') }}
                        </th>
                        <td>
                            {{ $laptop->hardware_specs }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.laptop.fields.manufacturer') }}
                        </th>
                        <td>
                            {{ $laptop->manufacturer->contactinfo ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.laptop.fields.services') }}
                        </th>
                        <td>
                            {{ $laptop->services->services ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.laptops.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        {{ trans('global.relatedData') }}
    </div>
    <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
        <li class="nav-item">
            <a class="nav-link" href="#item_name3_producthistories" role="tab" data-toggle="tab">
                {{ trans('cruds.producthistory.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="item_name3_producthistories">
            @includeIf('admin.laptops.relationships.itemName3Producthistories', ['producthistories' => $laptop->itemName3Producthistories])
        </div>
    </div>
</div>

@endsection