<?php

namespace App\Models\Enums;

use Exception;

enum DoctorStatusEnum: int
{
    case VeryBad = 0;
    case Bad = 1;
    case Average = 2;
    case Good = 3;
    case VeryGood = 4;

    public function toString(): string
    {
        return match ($this) {
            self::VeryBad => "Very Bad",
            self::Bad => "Bad",
            self::Average => "Average",
            self::Good => "Good",
            self::VeryGood => "Very Good",

            default => throw new Exception("Invalid user role state"),
        };
    }

    public function toFarsiString(): string
    {
        return match ($this) {
            self::VeryBad => "خیلی بد",
            self::Bad => "بد",
            self::Average => "معمولی",
            self::Good => "خوب",
            self::VeryGood => "خیلی خوب",
            default => throw new Exception("Invalid user role state"),
        };
    }
}
