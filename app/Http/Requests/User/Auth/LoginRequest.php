<?php

namespace App\Http\Requests\User\Auth;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{

    public function rules(): array
    {
        return [
            'phone_number' => 'required|digits:11',
            'otp_token' => 'required|digits:4'
        ];
    }

    public function messages(): array
    {
        return [
            'phone_number.required' => 'شماره تلفن الزامی هست',
            'phone_number.digits' => 'شماره تلفن 11 رقمی وارد کنید',
            'otp_token.digits' => 'کد 4 رقمی را وارد کنید',
            'otp_token.required' => 'کد پیامک شده الزامیست'
        ];
    }
}
