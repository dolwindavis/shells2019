<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventRegisterRequest extends FormRequest
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
            'logo' => 'required|image',
            'headname' => 'required',
            'headimage' => 'required|image',
            'headphone' => 'required',
            'heademail' => 'required',
            'info' => 'required',
            'rules' => 'required',
            'groupevent' =>'required',
            //'groupnumber'=>'required',
            'maxnumber' =>'required',
            'exclusive' => 'required',

        ];
    }
}
