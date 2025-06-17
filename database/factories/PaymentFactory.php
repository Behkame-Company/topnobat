<?php

namespace Database\Factories;

use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class PaymentFactory extends Factory
{
    public function definition(): array
    {
        return [
            'appointment_id' => Appointment::inrandomorder()->first()->id,
            'user_id' => User::inrandomorder()->first()->id,
            'doctor_id' => Doctor::inrandomorder()->first()->id,
            'amount' => '100,000',
            'transaction_id' => '12345678',
            'status' => $this->faker->numberBetween(0,2)
        ];
    }
}
