<?php

namespace App\Http\Requests;

use App\Models\Computer;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreComputerRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('computer_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'nullable',
            ],
            'user_id' => [
                'required',
                'integer',
            ],
            'model' => [
                'string',
                'nullable',
            ],
            'year' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'price' => [
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
            'hardware_specs' => [
                'string',
                'nullable',
            ],
        ];
    }
}
