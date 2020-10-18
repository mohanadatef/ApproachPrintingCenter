<?php

namespace App\Http\Requests\admin\Order;

use Illuminate\Foundation\Http\FormRequest;

class OrderAddTypeRequest extends FormRequest
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
        if($this->quantity == null)
        {
        return [
            'type_id'=>'required|exists:types,id',
            'size_id'=>'required|exists:sizes,id',
            'meter'=>'required',
        ];
        }
        elseif($this->meter == null)
        {
            return [
                'type_id'=>'required|exists:types,id',
                'size_id'=>'required|exists:sizes,id',
                'quantity'=>'required',
            ];
        }
    }
}
