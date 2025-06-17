<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Specialty;

class PaymentSeeder extends Seeder
{
    public function run(): void
    {
        Specialty::factory()->count(10)->create();
    }
}
