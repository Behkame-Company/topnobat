<?php

namespace App\Http\Requests\User\Auth;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{

    public function rules(): array
    {
        return [
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'social_number' => 'required|string',
        ];
    }

    public function messages(): array
    {
        return [
            'first_name.required' => 'نام مورد نیاز است',
            'last_name.digits' => 'نام خانوادگی مورد نیاز است',
            'social_number' => 'کد ملی مورد نیاز است'
        ];
    }
}
