<?php

namespace App\Http\Requests\admin\Cart;

use Illuminate\Foundation\Http\FormRequest;

class AddCartLaserRequest extends FormRequest
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
            'filename' => 'required',
        ];
    }
}
