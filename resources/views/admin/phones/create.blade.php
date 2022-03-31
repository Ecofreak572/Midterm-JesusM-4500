@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.phone.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.phones.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">{{ trans('cruds.phone.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}">
                @if($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.phone.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="user_id">{{ trans('cruds.phone.fields.user') }}</label>
                <select class="form-control select2 {{ $errors->has('user') ? 'is-invalid' : '' }}" name="user_id" id="user_id" required>
                    @foreach($users as $id => $entry)
                        <option value="{{ $id }}" {{ old('user_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('user'))
                    <span class="text-danger">{{ $errors->first('user') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.phone.fields.user_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="model">{{ trans('cruds.phone.fields.model') }}</label>
                <input class="form-control {{ $errors->has('model') ? 'is-invalid' : '' }}" type="text" name="model" id="model" value="{{ old('model', '') }}">
                @if($errors->has('model'))
                    <span class="text-danger">{{ $errors->first('model') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.phone.fields.model_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="price">{{ trans('cruds.phone.fields.price') }}</label>
                <input class="form-control {{ $errors->has('price') ? 'is-invalid' : '' }}" type="text" name="price" id="price" value="{{ old('price', '') }}">
                @if($errors->has('price'))
                    <span class="text-danger">{{ $errors->first('price') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.phone.fields.price_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="year">{{ trans('cruds.phone.fields.year') }}</label>
                <input class="form-control {{ $errors->has('year') ? 'is-invalid' : '' }}" type="text" name="year" id="year" value="{{ old('year', '') }}">
                @if($errors->has('year'))
                    <span class="text-danger">{{ $errors->first('year') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.phone.fields.year_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="date">{{ trans('cruds.phone.fields.date') }}</label>
                <input class="form-control date {{ $errors->has('date') ? 'is-invalid' : '' }}" type="text" name="date" id="date" value="{{ old('date') }}">
                @if($errors->has('date'))
                    <span class="text-danger">{{ $errors->first('date') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.phone.fields.date_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="invoice">{{ trans('cruds.phone.fields.invoice') }}</label>
                <input class="form-control {{ $errors->has('invoice') ? 'is-invalid' : '' }}" type="number" name="invoice" id="invoice" value="{{ old('invoice', '') }}" step="1">
                @if($errors->has('invoice'))
                    <span class="text-danger">{{ $errors->first('invoice') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.phone.fields.invoice_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="hardware_specs">{{ trans('cruds.phone.fields.hardware_specs') }}</label>
                <input class="form-control {{ $errors->has('hardware_specs') ? 'is-invalid' : '' }}" type="text" name="hardware_specs" id="hardware_specs" value="{{ old('hardware_specs', '') }}">
                @if($errors->has('hardware_specs'))
                    <span class="text-danger">{{ $errors->first('hardware_specs') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.phone.fields.hardware_specs_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="manufacturer_id">{{ trans('cruds.phone.fields.manufacturer') }}</label>
                <select class="form-control select2 {{ $errors->has('manufacturer') ? 'is-invalid' : '' }}" name="manufacturer_id" id="manufacturer_id">
                    @foreach($manufacturers as $id => $entry)
                        <option value="{{ $id }}" {{ old('manufacturer_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('manufacturer'))
                    <span class="text-danger">{{ $errors->first('manufacturer') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.phone.fields.manufacturer_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="services_id">{{ trans('cruds.phone.fields.services') }}</label>
                <select class="form-control select2 {{ $errors->has('services') ? 'is-invalid' : '' }}" name="services_id" id="services_id">
                    @foreach($services as $id => $entry)
                        <option value="{{ $id }}" {{ old('services_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('services'))
                    <span class="text-danger">{{ $errors->first('services') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.phone.fields.services_helper') }}</span>
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