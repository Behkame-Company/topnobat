<?php

namespace Database\Seeders;

use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\DoctorSpecialty;
use App\Models\Location;
use App\Models\Payment;
use App\Models\Schedule;
use App\Models\Specialty;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        Location::factory(10)->create();
        User::factory(10)->create();
        Doctor::factory(10)->create();
        Schedule::factory(10)->create();
        Appointment::factory(10)->create();
        Payment::factory(10)->create();
        Specialty::factory(10)->create();
        $this->call([
            DoctorSpecialtySeeder::class,
        ]);
    }
}
