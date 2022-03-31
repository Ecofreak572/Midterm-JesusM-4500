<?php

namespace App\Http\Requests;

use App\Models\Computer;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyComputerRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('computer_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:computers,id',
        ];
    }
}
