<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

use App\Staff;

class StaffRequest extends Request
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
        //this method of validating is deprecated for versio laravel 5.2
        
        
        if($this->method()=='PATCH'){
            $staff_id=$this->route()->parameters()['staff']['attributes']['staff_id'];
            $email_rule='required|email|max:255|unique:staff,email,'.$staff_id.',staff_id';
        }
        else{
            $email_rule='required|email|max:255|unique:staff';
        }
        return [
            'store_id'=>'required',
            'first_name'=>'required|min:3',
            'last_name'=>'required|min:3',
            'email'=>$email_rule,
            'address.address'=>'required|min:3',            
            'address.district'=>'required',
            'city_id'=>'required',
            'address.postal_code'=>'required|alpha_num|min:5|max:8',
            'address.phone'=>'required|alpha_num|min:10|max:12',             
        ];
    }
}
