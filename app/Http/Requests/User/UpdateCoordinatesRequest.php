<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCoordinatesRequest extends FormRequest
{

    public function rules(): array
    {
        return [
            'user_latitude' => 'required',
            'user_longitude' => 'required'
        ];
    }

    public function messages(): array
    {
        return [
            'user_latitude.required' => 'عرض جغرافیایی مورد نیاز است.',
            'user_longitude.required' => 'طول جغرافیایی مورد نیاز است'
        ];
    }
}
