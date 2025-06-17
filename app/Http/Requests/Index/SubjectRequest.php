<?php

namespace App\Http\Requests\Index;

use Illuminate\Foundation\Http\FormRequest;

class SubjectRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'subject' => 'required|string'
        ];
    }
}
