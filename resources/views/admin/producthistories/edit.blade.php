@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.producthistory.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.producthistories.update", [$producthistory->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="services">{{ trans('cruds.producthistory.fields.services') }}</label>
                <input class="form-control {{ $errors->has('services') ? 'is-invalid' : '' }}" type="text" name="services" id="services" value="{{ old('services', $producthistory->services) }}">
                @if($errors->has('services'))
                    <span class="text-danger">{{ $errors->first('services') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.producthistory.fields.services_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="software">{{ trans('cruds.producthistory.fields.software') }}</label>
                <input class="form-control {{ $errors->has('software') ? 'is-invalid' : '' }}" type="text" name="software" id="software" value="{{ old('software', $producthistory->software) }}">
                @if($errors->has('software'))
                    <span class="text-danger">{{ $errors->first('software') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.producthistory.fields.software_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="item_names">{{ trans('cruds.producthistory.fields.item_name') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('item_names') ? 'is-invalid' : '' }}" name="item_names[]" id="item_names" multiple>
                    @foreach($item_names as $id => $item_name)
                        <option value="{{ $id }}" {{ (in_array($id, old('item_names', [])) || $producthistory->item_names->contains($id)) ? 'selected' : '' }}>{{ $item_name }}</option>
                    @endforeach
                </select>
                @if($errors->has('item_names'))
                    <span class="text-danger">{{ $errors->first('item_names') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.producthistory.fields.item_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="item_name_1s">{{ trans('cruds.producthistory.fields.item_name_1') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('item_name_1s') ? 'is-invalid' : '' }}" name="item_name_1s[]" id="item_name_1s" multiple>
                    @foreach($item_name_1s as $id => $item_name_1)
                        <option value="{{ $id }}" {{ (in_array($id, old('item_name_1s', [])) || $producthistory->item_name_1s->contains($id)) ? 'selected' : '' }}>{{ $item_name_1 }}</option>
                    @endforeach
                </select>
                @if($errors->has('item_name_1s'))
                    <span class="text-danger">{{ $errors->first('item_name_1s') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.producthistory.fields.item_name_1_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="item_name_2s">{{ trans('cruds.producthistory.fields.item_name_2') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('item_name_2s') ? 'is-invalid' : '' }}" name="item_name_2s[]" id="item_name_2s" multiple>
                    @foreach($item_name_2s as $id => $item_name_2)
                        <option value="{{ $id }}" {{ (in_array($id, old('item_name_2s', [])) || $producthistory->item_name_2s->contains($id)) ? 'selected' : '' }}>{{ $item_name_2 }}</option>
                    @endforeach
                </select>
                @if($errors->has('item_name_2s'))
                    <span class="text-danger">{{ $errors->first('item_name_2s') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.producthistory.fields.item_name_2_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="item_name_3s">{{ trans('cruds.producthistory.fields.item_name_3') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('item_name_3s') ? 'is-invalid' : '' }}" name="item_name_3s[]" id="item_name_3s" multiple>
                    @foreach($item_name_3s as $id => $item_name_3)
                        <option value="{{ $id }}" {{ (in_array($id, old('item_name_3s', [])) || $producthistory->item_name_3s->contains($id)) ? 'selected' : '' }}>{{ $item_name_3 }}</option>
                    @endforeach
                </select>
                @if($errors->has('item_name_3s'))
                    <span class="text-danger">{{ $errors->first('item_name_3s') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.producthistory.fields.item_name_3_helper') }}</span>
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