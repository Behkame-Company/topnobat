<?php

namespace App\Http\Requests\User\Auth;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserlocationRequest extends FormRequest
{

    public function rules(): array
    {
        return [
            'location_id' => 'required|int'
        ];
    }

    public function messages()
    {
        return [
            'location_id.required' => 'شهر خود را انتخاب کنید'
        ];
    }
}
