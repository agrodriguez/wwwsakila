<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class FilmRequest extends Request
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
            'title'=>'required|min:3',
            'description'=>'required',
            'release_year'=>'required',
            'language_id'=>'required',
            'original_language_id'=>'required',
            'rental_duration'=>'required|integer',
            'rental_rate'=>'required|numeric',
            'length'=>'required|integer|max:500',
            'replacement_cost'=>'required|numeric',
            'rating'=>'required',
            'special_features'=>'required',
        ];
    }
}
