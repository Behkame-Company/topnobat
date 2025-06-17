<?php

namespace App\Http\Resources\User\Schedule;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ScheduleResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'doctor_id' => $this->doctor_id,
            'appontment_time' => $this->appointment_time,
            'appointment_date' => $this->appointment_date,
            'status' => $this->status,
        ];
    }
}
