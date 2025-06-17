<?php

namespace Database\Factories;

use App\Models\Location;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    protected static ?string $password;

    public function definition(): array
    {
        return [
           'first_name' => Arr::random(['علی', 'امیر', 'عماد', 'زهرا', 'ابوالفضل']),
            'last_name' => Arr::random(['صالحی','امیری','رنجبر','صادقی','توکلی']),
            'phone_number' => $this->faker->phoneNumber(),
            'latitude' => $this->faker->latitude(),
            'longitude' => $this->faker->longitude(),
            'social_number' => $this->faker->unique()->numerify('##########'),
            'location_id' => Location::inrandomorder()->first()->id
        ];
    }

    public function unverified(): static
    {
        return $this->state(fn(array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
