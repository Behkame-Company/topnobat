<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('doctor_specialty', function (Blueprint $table) {
            $table->id();
            $table->foreignId('doctor_id')->constrained('doctors');
            $table->foreignId('specialty_id')->constrained('specialties');
            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('doctor_specialty');
    }
};
