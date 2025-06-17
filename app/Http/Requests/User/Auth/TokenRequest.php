<?php

namespace App\Http\Requests\User\Auth;

use Illuminate\Foundation\Http\FormRequest;

class TokenRequest extends FormRequest
{

    public function rules(): array
    {
        return [
            'phone_number' => 'required|digits:11'
        ];
    }

    public function messages(): array
    {
        return [
            'phone_number.required' => 'شماره تلفن الزامی هست',
            'phone_number.digits' => 'شماره تلفن 11 رقمی وارد کنید',
        ];
    }
}
