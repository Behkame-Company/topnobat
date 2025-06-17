<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('doctor_id')->constrained('doctors');

            $table->foreignId('schedule_id')->constrained('schedules')->unique();
            $table->string('status');
            $table->string('appointment_time')->nullable();
            $table->string('appointment_date')->nullable();
            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('appointments');
    }
};
