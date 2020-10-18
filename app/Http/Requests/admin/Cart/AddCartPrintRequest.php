<?php

namespace App\Http\Requests\admin\Cart;

use Illuminate\Foundation\Http\FormRequest;

class AddCartPrintRequest extends FormRequest
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
            'type_id' => 'required|exists:types,id',
            'size_id' => 'required|exists:sizes,id',
            'machine_id' => 'required|exists:machines,id',
            'color_id' => 'required|exists:colors,id',
            'quantity'=>    'min:1',
        ];
    }
}
