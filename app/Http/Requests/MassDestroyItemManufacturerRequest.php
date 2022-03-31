<?php

namespace App\Http\Requests;

use App\Models\ItemManufacturer;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyItemManufacturerRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('item_manufacturer_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:item_manufacturers,id',
        ];
    }
}
