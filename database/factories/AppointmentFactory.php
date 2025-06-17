<?php

namespace Database\Factories;

use App\Models\Doctor;
use App\Models\Schedule;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;


class AppointmentFactory extends Factory
{
    public function definition(): array
    {
        return [
            'user_id' => User::inRandomOrder()->first()->id,
            'doctor_id' => Doctor::inRandomOrder()->first()->id,
            'status' => $this->faker->numberBetween(0, 2),
            'schedule_id' => Schedule::inRandomOrder()->first()->id,
            'appointment_time' => $this->faker->time(),
            'appointment_date' => $this->faker->date(),
        ];
    }
}
