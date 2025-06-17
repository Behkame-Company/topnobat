<?php

namespace App\Http\Resources\Admin\Location;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LocationResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'city' => $this->city,
            'province' => $this->province,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
