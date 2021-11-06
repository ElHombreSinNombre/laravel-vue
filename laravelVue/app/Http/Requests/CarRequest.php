<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use Auth;

class CarRequest extends FormRequest
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
            'model' => 'max:50',
            'brand' => 'max:12',
            'color' => 'max:7',
            'license' => 'required|max:7',
        ];
    }

    public function messages()
    {
        return [
            'model.max' => 'The model cannot be more than 50 characters',
            'brand.max' => 'The brand cannot be more than 12 characterss',
            'color.max' => 'The color cannot be more than 7 characterss',
            'license.required' => 'The license is required',
            'license.max' => 'The license cannot be more than 7 characters',
        ];
    }
}
