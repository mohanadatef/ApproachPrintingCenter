<?php

namespace App\Http\Requests\admin\Machine;

use Illuminate\Foundation\Http\FormRequest;

class MachineCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'=>'required|unique:machines',
            'order'=>'required|min:1|unique:machines',
            'price'=>'required',
            'kind'=>'required',
        ];
    }
}
