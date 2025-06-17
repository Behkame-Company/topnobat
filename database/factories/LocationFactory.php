<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class LocationFactory extends Factory
{
    protected static array $citiesPool = ['رفسنجان', 'کرمان', 'تهران', 'اصفهان', 'یزد','شیراز','مشهد','بندر عباس','بندر لنگه','زاهدان'];
    protected static array $usedCities = [];

    public function definition(): array
    {
        $availableCities = array_diff(self::$citiesPool, self::$usedCities);

        if (empty($availableCities)) {
            $city = Arr::random(self::$citiesPool);
        } else {
            $city = Arr::random($availableCities);
            self::$usedCities[] = $city;
        }
        return [
            'city' => $city,
            'province' => 'کرمان',
        ];
    }
}
