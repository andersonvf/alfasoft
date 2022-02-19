<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use \App\Rules\Dash;

class ProjectRequest extends FormRequest
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
            'code'          => '',
            'number'        => ''
        ];
    }


    // public function withValidator($validator)
    // {
    //     $validator->after(function($validator) {
    //         if ($this->hasDash()) {
    //             $validator->errors()->add('name', 'O campo nome não pode ter -');
    //         }
    //     });
    // }

    public function hasDash()
    {
        return strpos($this->name, '-');
    }
    
    public function messages()
    {
        return [
            'name.required' => "O campo nome deve ser preenchido."
        ];
    }
}
