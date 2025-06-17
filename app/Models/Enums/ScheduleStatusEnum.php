<?php

namespace App\Models\Enums;

use Exception;

enum ScheduleStatusEnum: int
{
    case Available = 0;
    case Reserved = 1;

    public function toString(): string
    {
        return match ($this) {
            self::Available => "Available",
            self::Reserved => "Reserved",
            default => throw new Exception("Invalid user role state"),
        };
    }

    public function toFarsiString(): string
    {
        return match ($this) {
            self::Available => 'موجود',
            self::Reserved => 'رزرو شده',
            default => throw new Exception("Invalid user role state"),
        };
    }
}
