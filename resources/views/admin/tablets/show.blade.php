@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.tablet.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.tablets.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.tablet.fields.id') }}
                        </th>
                        <td>
                            {{ $tablet->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tablet.fields.name') }}
                        </th>
                        <td>
                            {{ $tablet->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tablet.fields.user') }}
                        </th>
                        <td>
                            {{ $tablet->user->contactinfo ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tablet.fields.model') }}
                        </th>
                        <td>
                            {{ $tablet->model }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tablet.fields.price') }}
                        </th>
                        <td>
                            {{ $tablet->price }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tablet.fields.year') }}
                        </th>
                        <td>
                            {{ $tablet->year }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tablet.fields.date') }}
                        </th>
                        <td>
                            {{ $tablet->date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tablet.fields.invoice') }}
                        </th>
                        <td>
                            {{ $tablet->invoice }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tablet.fields.hardware_specs') }}
                        </th>
                        <td>
                            {{ $tablet->hardware_specs }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tablet.fields.manufacturer') }}
                        </th>
                        <td>
                            {{ $tablet->manufacturer->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tablet.fields.services') }}
                        </th>
                        <td>
                            {{ $tablet->services->services ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.tablets.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection