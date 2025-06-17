<?php

namespace App\Http\Requests\Index;

use Illuminate\Foundation\Http\FormRequest;

class RecommendRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'specialty_id' => 'required|int'
        ];
    }
}
