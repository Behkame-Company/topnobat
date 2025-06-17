<?php

namespace App\Http\Resources\User\User;

use App\Http\Resources\User\Location\LocationResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'social_number' => $this->social_number,
            'phone_number' => $this->phone_number,
            'latitude' => $this->latitude,
            'longitude' => $this->longitude,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'location' => new LocationResource($this->whenLoaded('location'))
        ];
    }
}
