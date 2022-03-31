<?php

namespace App\Http\Requests;

use App\Models\Producthistory;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreProducthistoryRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('producthistory_create');
    }

    public function rules()
    {
        return [
            'services' => [
                'string',
                'nullable',
            ],
            'software' => [
                'string',
                'nullable',
            ],
            'item_names.*' => [
                'integer',
            ],
            'item_names' => [
                'array',
            ],
            'item_name_1s.*' => [
                'integer',
            ],
            'item_name_1s' => [
                'array',
            ],
            'item_name_2s.*' => [
                'integer',
            ],
            'item_name_2s' => [
                'array',
            ],
            'item_name_3s.*' => [
                'integer',
            ],
            'item_name_3s' => [
                'array',
            ],
        ];
    }
}
