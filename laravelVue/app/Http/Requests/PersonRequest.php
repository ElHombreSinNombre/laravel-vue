<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PersonRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'max:12',
            'lastname' => 'max:12',
            'age' => 'max:2',
            'dni' => 'max:7',
            'email' => 'required|unique:email|max:12',
        ];
    }

    public function messages()
    {
        return [
            'name.name.max' => 'Your name cannot be more than 12 characters',
            'lastname.max' => 'Your lastname cannot be more than 12 characters',
            'age.age.max' => 'Your age cannot be more than 2 characters',
            'dni.dni.max' => 'Your DNI cannot be more than 7 characters',
            'email.required' => 'Your email is required',
            'email.unique' => 'Your email must be unique',
            'email.max' => 'Your email cannot be more than 12 characters',
        ];
    }
}
