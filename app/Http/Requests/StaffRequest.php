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
            $username_rule='required|alpha_num|max:255|unique:staff,username,'.$staff_id.',staff_id';
            $password_rule='min:6|confirmed';
        }
        else{
            $email_rule='required|email|max:255|unique:staff';
            $username_rule='required|max:255|unique:staff';
            $password_rule='required|min:6|confirmed';
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
            'username' => $username_rule,
            'password' => $password_rule,           
        ];
    }
}
