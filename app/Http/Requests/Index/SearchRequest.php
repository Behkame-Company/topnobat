<?php

namespace App\Http\Requests\Index;

use Illuminate\Foundation\Http\FormRequest;

class SearchRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'search' => 'nullable|string'
        ];
    }
}
