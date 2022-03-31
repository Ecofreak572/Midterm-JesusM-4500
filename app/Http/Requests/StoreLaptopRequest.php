<?php

namespace App\Http\Requests;

use App\Models\Laptop;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreLaptopRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('laptop_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'nullable',
            ],
            'model' => [
                'string',
                'nullable',
            ],
            'year' => [
                'string',
                'nullable',
            ],
            'date' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'invoice' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'price' => [
                'string',
                'nullable',
            ],
            'hardware_specs' => [
                'string',
                'nullable',
            ],
        ];
    }
}
