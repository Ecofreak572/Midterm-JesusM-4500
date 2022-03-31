<?php

namespace App\Http\Requests;

use App\Models\Producthistory;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyProducthistoryRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('producthistory_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:producthistories,id',
        ];
    }
}
