<?php

namespace App\Http\Requests\admin\Print_Price;

use Illuminate\Foundation\Http\FormRequest;

class Print_PriceCreateRequest extends FormRequest
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
            'type_id'=>'required|exists:types,id',
            'size_id'=>'required|exists:sizes,id',
            'machine_id'=>'required|exists:machines,id',

            'price'=>'required',
            'color_id'=>'required|exists:colors,id',
        ];

    }

}
