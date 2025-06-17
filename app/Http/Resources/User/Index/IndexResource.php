<?php

namespace App\Http\Resources\User\Index;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class IndexResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'top_doctor' => $this['top_doctor'],
            'oldest_doctor' => $this['oldest_doctor'],
            'nearest_doc' => $this['nearest_doc'],
        ];
    }
}
