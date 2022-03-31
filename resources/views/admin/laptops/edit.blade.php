@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.laptop.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.laptops.update", [$laptop->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="name">{{ trans('cruds.laptop.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $laptop->name) }}">
                @if($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.laptop.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="user_id">{{ trans('cruds.laptop.fields.user') }}</label>
                <select class="form-control select2 {{ $errors->has('user') ? 'is-invalid' : '' }}" name="user_id" id="user_id">
                    @foreach($users as $id => $entry)
                        <option value="{{ $id }}" {{ (old('user_id') ? old('user_id') : $laptop->user->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('user'))
                    <span class="text-danger">{{ $errors->first('user') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.laptop.fields.user_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="model">{{ trans('cruds.laptop.fields.model') }}</label>
                <input class="form-control {{ $errors->has('model') ? 'is-invalid' : '' }}" type="text" name="model" id="model" value="{{ old('model', $laptop->model) }}">
                @if($errors->has('model'))
                    <span class="text-danger">{{ $errors->first('model') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.laptop.fields.model_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="year">{{ trans('cruds.laptop.fields.year') }}</label>
                <input class="form-control {{ $errors->has('year') ? 'is-invalid' : '' }}" type="text" name="year" id="year" value="{{ old('year', $laptop->year) }}">
                @if($errors->has('year'))
                    <span class="text-danger">{{ $errors->first('year') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.laptop.fields.year_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="date">{{ trans('cruds.laptop.fields.date') }}</label>
                <input class="form-control date {{ $errors->has('date') ? 'is-invalid' : '' }}" type="text" name="date" id="date" value="{{ old('date', $laptop->date) }}">
                @if($errors->has('date'))
                    <span class="text-danger">{{ $errors->first('date') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.laptop.fields.date_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="invoice">{{ trans('cruds.laptop.fields.invoice') }}</label>
                <input class="form-control {{ $errors->has('invoice') ? 'is-invalid' : '' }}" type="number" name="invoice" id="invoice" value="{{ old('invoice', $laptop->invoice) }}" step="1">
                @if($errors->has('invoice'))
                    <span class="text-danger">{{ $errors->first('invoice') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.laptop.fields.invoice_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="price">{{ trans('cruds.laptop.fields.price') }}</label>
                <input class="form-control {{ $errors->has('price') ? 'is-invalid' : '' }}" type="text" name="price" id="price" value="{{ old('price', $laptop->price) }}">
                @if($errors->has('price'))
                    <span class="text-danger">{{ $errors->first('price') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.laptop.fields.price_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="hardware_specs">{{ trans('cruds.laptop.fields.hardware_specs') }}</label>
                <input class="form-control {{ $errors->has('hardware_specs') ? 'is-invalid' : '' }}" type="text" name="hardware_specs" id="hardware_specs" value="{{ old('hardware_specs', $laptop->hardware_specs) }}">
                @if($errors->has('hardware_specs'))
                    <span class="text-danger">{{ $errors->first('hardware_specs') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.laptop.fields.hardware_specs_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="manufacturer_id">{{ trans('cruds.laptop.fields.manufacturer') }}</label>
                <select class="form-control select2 {{ $errors->has('manufacturer') ? 'is-invalid' : '' }}" name="manufacturer_id" id="manufacturer_id">
                    @foreach($manufacturers as $id => $entry)
                        <option value="{{ $id }}" {{ (old('manufacturer_id') ? old('manufacturer_id') : $laptop->manufacturer->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('manufacturer'))
                    <span class="text-danger">{{ $errors->first('manufacturer') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.laptop.fields.manufacturer_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="services_id">{{ trans('cruds.laptop.fields.services') }}</label>
                <select class="form-control select2 {{ $errors->has('services') ? 'is-invalid' : '' }}" name="services_id" id="services_id">
                    @foreach($services as $id => $entry)
                        <option value="{{ $id }}" {{ (old('services_id') ? old('services_id') : $laptop->services->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('services'))
                    <span class="text-danger">{{ $errors->first('services') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.laptop.fields.services_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection