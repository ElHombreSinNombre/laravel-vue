<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CarRequest extends FormRequest
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
            'model' => 'max:12',
            'brand' => 'max:12',
            'color' => 'max:12',
            'license' => 'required|unique:license|max:7',
        ];
    }

    public function messages()
    {
        return [
            'title.title' => 'El modelo debe tener menos de 12 caracteres',
            'brand.brand' => 'La marca debe tener menos de 12 caracteres',
            'color.color' => 'El color debe tener menos de 12 caracteres',
            'license.required' => 'La matricula es obligatoria, debe tener menos de 7 caracteres y no se puede repetir',

        ];
    }
}
