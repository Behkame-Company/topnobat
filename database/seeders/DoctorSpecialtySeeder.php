<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Doctor;
use App\Models\Specialty;
use App\Models\DoctorSpecialty;

class DoctorSpecialtySeeder extends Seeder
{
    public function run(): void
    {
        $doctors = Doctor::pluck('id');
        $specialties = Specialty::pluck('id');

        foreach ($doctors as $doctor) {
            $assignedSpecialties = $specialties->random(rand(1, 2));

            foreach ($assignedSpecialties as $specialty) {
                $exists = DoctorSpecialty::query()
                    ->where('doctor_id', $doctor)
                    ->where('specialty_id', $specialty)
                    ->exists();

                if (!$exists) {
                    DoctorSpecialty::query()
                        ->create([
                            'doctor_id' => $doctor,
                            'specialty_id' => $specialty,
                            'created_at' => now(),
                            'updated_at' => now(),
                        ]);
                }
            }
        }
    }
}
