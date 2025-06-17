<?php

namespace App\Models\Enums;

use Exception;

enum DayOfTheWeekEnum: string
{
    case saturday = 'saturday';
    case sunday = 'sunday';
    case monday = 'monday';
    case tuesday = 'tuesday';
    case wednesday  = 'wednesday';
    case thursday  = 'thursday';
    case friday = 'friday';

    public function toString(): string
    {
        return match ($this) {
            self::saturday => "Saturday",
            self::sunday => "Sunday",
            self::monday => "Monday",
            self::tuesday => "Tuesday",
            self::wednesday => "Wednesday",
            self::thursday => "Thursday",
            self::friday => "Friday",

            default => throw new Exception("Invalid Day"),
        };
    }

    public function toFarsiString(): string
    {
        return match ($this) {
            self::saturday => "شنبه",
            self::sunday => "یکشنبه",
            self::monday => "دوشنبه",
            self::tuesday => "سه شنبه",
            self::wednesday => "چهارشنبه",
            self::thursday => "پنجشنبه",
            self::friday => "جمعه",
            default => throw new Exception("Invalid Day"),
        };
    }
    public function toCarbonIndex(): int
    {
        return match ($this) {
            self::sunday => 0,
            self::monday => 1,
            self::tuesday => 2,
            self::wednesday => 3,
            self::thursday => 4,
            self::friday => 5,
            self::saturday => 6,
            default => throw new Exception("Invalid Day"),
        };
    }
}
