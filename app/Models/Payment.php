<?php

namespace App\Models;

use App\Models\Enums\PaymentStatusEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Payment extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'status' => PaymentStatusEnum::class
    ];

    public function appoinment(): BelongsTo
    {
        return $this->belongsTo(Appointment::class);
    }
}
