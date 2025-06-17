<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('doctors', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->tinyInteger('status')->unsigned()->check('status >= 0 AND status <= 5');
            $table->longText('description');
            $table->longText('addresses');
            $table->longText('phone_numbers');
            $table->longText('work_plans');
            $table->decimal('latitude', 10, 8)->nullable();
            $table->decimal('longitude', 11, 8)->nullable();
            $table->string('doctor_avatar')->nullable();
            $table->foreignId('location_id')->constrained('locations');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('doctors');
    }
};
