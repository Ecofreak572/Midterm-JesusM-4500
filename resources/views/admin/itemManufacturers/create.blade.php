@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.itemManufacturer.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.item-manufacturers.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">{{ trans('cruds.itemManufacturer.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}">
                @if($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.itemManufacturer.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="contactinfo">{{ trans('cruds.itemManufacturer.fields.contactinfo') }}</label>
                <input class="form-control {{ $errors->has('contactinfo') ? 'is-invalid' : '' }}" type="text" name="contactinfo" id="contactinfo" value="{{ old('contactinfo', '') }}">
                @if($errors->has('contactinfo'))
                    <span class="text-danger">{{ $errors->first('contactinfo') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.itemManufacturer.fields.contactinfo_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="address">{{ trans('cruds.itemManufacturer.fields.address') }}</label>
                <input class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}" type="text" name="address" id="address" value="{{ old('address', '') }}">
                @if($errors->has('address'))
                    <span class="text-danger">{{ $errors->first('address') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.itemManufacturer.fields.address_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="sales_contact_info">{{ trans('cruds.itemManufacturer.fields.sales_contact_info') }}</label>
                <input class="form-control {{ $errors->has('sales_contact_info') ? 'is-invalid' : '' }}" type="email" name="sales_contact_info" id="sales_contact_info" value="{{ old('sales_contact_info') }}">
                @if($errors->has('sales_contact_info'))
                    <span class="text-danger">{{ $errors->first('sales_contact_info') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.itemManufacturer.fields.sales_contact_info_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="tech_support_contact_info">{{ trans('cruds.itemManufacturer.fields.tech_support_contact_info') }}</label>
                <input class="form-control {{ $errors->has('tech_support_contact_info') ? 'is-invalid' : '' }}" type="email" name="tech_support_contact_info" id="tech_support_contact_info" value="{{ old('tech_support_contact_info') }}">
                @if($errors->has('tech_support_contact_info'))
                    <span class="text-danger">{{ $errors->first('tech_support_contact_info') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.itemManufacturer.fields.tech_support_contact_info_helper') }}</span>
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