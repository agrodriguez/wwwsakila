<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class AddressRequest extends Request
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
            'address'=>'required|min:3',
            'address2'=>'required',
            'district'=>'required',
            'city_id'=>'required',
            'postal_code'=>'required|numeric|min:10|max:10',
            'phone'=>'required|numeric|min:10|max:10',            
        ];
    }
}
