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
            'age' => 'nullable|max:2',
            'dni' => 'max:7',
            'email' => 'required|unique:email|max:7',
        ];
    }

    public function messages()
    {
        return [
            'name.name' => 'El nombre debe tener menos de 12 caracteres',
            'lastname.lastname' => 'El apellido debe tener menos de 12 caracteres',
            'age.age' => 'La edad debe tener menos de 2 caracteres',
            'dni.dni' => 'El DNI debe tener menos de 7 caracteres',
            'email.required' => 'El email es obligatorio, debe tener menos de 7 caracteres y no se puede repetir',
        ];
    }
}
