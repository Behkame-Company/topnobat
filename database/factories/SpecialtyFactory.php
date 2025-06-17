<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;


class SpecialtyFactory extends Factory
{
    public function definition(): array
    {
        return [
            'specialty' => Arr::random(['مغز و اعصاب', 'دندان پزشک', 'قلب', 'کلیه']),
        ];
    }
}
