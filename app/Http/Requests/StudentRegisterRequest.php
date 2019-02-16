<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentRegisterRequest extends FormRequest
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
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|digits:10|',
            'reg_no' => 'required',
            'course' => 'required',
            'gender' => 'required'

        ];
    }


    /**
     * Custom message for validation
     *
     * @return array
     */
    public function messages()
    {
        return [
            'email.required' => 'Email is required!',
            'name.required' => 'Name is required!',
            'reg_no.required' => 'Register Number is required!',
            'phone.required'  => 'phone number Required!',
            'gender.required' => 'Gender Required!'
        ];
    }
}
