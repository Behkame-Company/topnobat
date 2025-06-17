<?php

namespace App\Http\Resources\Admin\Specialty;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SpecialtyResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'specialty' => $this->specialty,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
