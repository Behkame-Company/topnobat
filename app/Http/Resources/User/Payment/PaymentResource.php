<?php

namespace App\Http\Resources\User\Payment;


use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PaymentResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'doctor_id' => $this->doctor_id,
            'appointment_id' => $this->appointment_id,
            'amount' => $this->amount,
            'transaction_id' => $this->transaction_id,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
