<?php

namespace Database\Factories;

use App\Models\Doctor;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Schedule>
 */
class ScheduleFactory extends Factory
{

    public function definition(): array
    {
        return [
            'doctor_id'=>Doctor::inRandomOrder()->first()->id,
            'appointment_time' => $this->faker->time(),
            'appointment_date' => $this->faker->date(),
            'status' => $this->faker->numberBetween(0, 1),
        ];
    }
}
