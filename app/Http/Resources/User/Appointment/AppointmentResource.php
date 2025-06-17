<?php

namespace App\Http\Resources\User\Appointment;

use App\Http\Resources\User\Schedule\ScheduleResource;
use App\Http\Resources\User\Doctor\DoctorResource;
use App\Http\Resources\User\Payment\PaymentResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AppointmentResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'status' => $this->status,
            'appointment_time' => $this->appointment_time,
            'appointment_date' => $this->appointment_date,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'payments' => PaymentResource::collection($this->whenLoaded('payments')),
            'schedule' => new ScheduleResource($this->whenLoaded('schedule')),
            'docotor' => new DoctorResource($this->whenloaded('doctor'))
        ];
    }
}
