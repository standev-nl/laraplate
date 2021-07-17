<?php

namespace App\Http\Requests\backend;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
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
     * @TODO: Fix validation rule for checkboxes
     */
    public function rules()
    {
        return [
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required',
            'locale' => 'required',
            'timezone' => 'required',
            'role' => 'required',
            //'can_be_impersonated' => 'boolean',
            //'active' => 'boolean',
        ];
    }
}
