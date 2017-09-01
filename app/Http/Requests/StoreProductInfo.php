<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductInfo extends FormRequest
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
            'name'=>'required|min:5',
            'discountPrice'=>'required|integer',
            'price'=>'required|integer',
            'size'=>'required',
            'color'=>'required',
            'weight'=>array('required','regex:/(^([\d]+)[\s]?(kg|pound)$)/ui'),
            'category_id'=>'required',
            'description'=>'required',
            'information'=>'required',
            'brand'=>'required',
            'stock'=>'required|integer',
            //
        ];
    }
    // custom error message while validating
    public function messages()
    {
        return [
            'weight.regex' => 'Weight must be followed by kg/pound. eg. 40 kg or 50 pound',

        ];
    }
}
