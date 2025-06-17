<?php

namespace App\Models\Enums;

use Exception;

enum PaymentStatusEnum: int
{
    case Pending = 0;
    case Approved = 1;
    case Declined = 2;

    public function toString(): string
    {
        return match ($this) {
            self::Pending => "Pending",
            self::Approved => "Approved",
            self::Declined => "Declined",
            default => throw new Exception("Invalid user role state"),
        };
    }

    public function toFarsiString(): string
    {
        return match ($this) {
            self::Pending => "در انتظار تایید",
            self::Approved => "تایید شده",
            self::Declined => "رد شده",
            default => throw new Exception("Invalid user role state"),
        };
    }
}
