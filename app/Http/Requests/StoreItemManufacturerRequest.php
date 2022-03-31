<?php

namespace App\Http\Requests;

use App\Models\ItemManufacturer;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreItemManufacturerRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('item_manufacturer_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'nullable',
            ],
            'contactinfo' => [
                'string',
                'nullable',
            ],
            'address' => [
                'string',
                'nullable',
            ],
        ];
    }
}
