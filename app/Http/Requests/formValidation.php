<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class formValidation extends FormRequest
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
          'customerName' => 'required|max:10',
            'customerEmail' => 'required|email',
            'customerPhone' =>'required|max:11|numeric'
        ];
    }
    public function messages(){
        return[
            'customerName.required' => 'Please enter you Name'
        ];
    }
}
