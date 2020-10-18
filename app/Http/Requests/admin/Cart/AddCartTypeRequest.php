<?php

namespace App\Http\Requests\admin\Cart;

use Illuminate\Foundation\Http\FormRequest;

class AddCartTypeRequest extends FormRequest
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
        if ($this->quantity == null && $this->meter == null)
        {
        return [
            'type_id' => 'required|exists:types,id',
            'size_id' => 'required|exists:sizes,id',
            'quantity'=>'required|min:1',
            'meter'=>'required|min:1',
        ];
        }
        elseif($this->quantity == null)
        {
            return [
                'type_id' => 'required|exists:types,id',
                'size_id' => 'required|exists:sizes,id',
                'meter'=>'required|min:1',
            ];
        }
        elseif($this->meter == null)
        {
            return [
                'type_id' => 'required|exists:types,id',
                'size_id' => 'required|exists:sizes,id',
                'quantity'=>'required|min:1',
            ];
        }
        else
        {
            return [
                'type_id' => 'required|exists:types,id',
                'size_id' => 'required|exists:sizes,id',
                'quantity'=>'required|min:1',
                'meter'=>'required|min:1',
            ];
        }
    }
}
