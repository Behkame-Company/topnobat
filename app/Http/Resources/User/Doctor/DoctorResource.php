<?php

namespace App\Http\Resources\User\Doctor;

use App\Http\Resources\User\Specialty\SpecialtyResource;
use App\Http\Resources\User\Location\LocationResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DoctorResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'status' => $this->status,
            'description' => $this->description,
            'addresses' => $this->addresses,
            'phone_numbers' => $this->phone_numbers,
            'work_plans' => $this->work_plans,
            'latitude' => $this->latitude,
            'longitude' => $this->longitude,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'location' => $this->whenLoaded('location', fn() => new LocationResource($this->location)),
            'specialties' => SpecialtyResource::collection($this->whenLoaded('specialties')),
        ];
    }
}
