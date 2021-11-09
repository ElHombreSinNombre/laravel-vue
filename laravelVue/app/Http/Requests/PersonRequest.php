<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use Auth;

class PersonRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'max:50',
            'lastname' => 'max:12',
            'age' => 'max:2',
            'dni' => 'required|max:9',
            'email' => 'required|max:24',
            'id_car' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.name.max' => 'Your name cannot be more than 12 characters',
            'lastname.max' => 'Your lastname cannot be more than 12 characters',
            'age.age.max' => 'Your age cannot be more than 2 characters',
            'dni.dni.max' => 'Your DNI cannot be more than 9 characters',
            'dni.dni.required' => 'Your DNI is required',
            'email.required' => 'Your email is required',
            'id_car.required' => 'Person must to have a car',
        ];
    }
}
