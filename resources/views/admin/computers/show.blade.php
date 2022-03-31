@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.computer.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.computers.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.computer.fields.id') }}
                        </th>
                        <td>
                            {{ $computer->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.computer.fields.name') }}
                        </th>
                        <td>
                            {{ $computer->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.computer.fields.user') }}
                        </th>
                        <td>
                            {{ $computer->user->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.computer.fields.model') }}
                        </th>
                        <td>
                            {{ $computer->model }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.computer.fields.year') }}
                        </th>
                        <td>
                            {{ $computer->year }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.computer.fields.price') }}
                        </th>
                        <td>
                            {{ $computer->price }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.computer.fields.date') }}
                        </th>
                        <td>
                            {{ $computer->date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.computer.fields.invoice') }}
                        </th>
                        <td>
                            {{ $computer->invoice }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.computer.fields.hardware_specs') }}
                        </th>
                        <td>
                            {{ $computer->hardware_specs }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.computer.fields.manufacturer') }}
                        </th>
                        <td>
                            {{ $computer->manufacturer->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.computer.fields.services') }}
                        </th>
                        <td>
                            {{ $computer->services->services ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.computers.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection