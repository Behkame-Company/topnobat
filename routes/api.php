<?php

use App\Http\Controllers\User\AppointmentController;
use App\Http\Controllers\User\DoctorController;
use App\Http\Controllers\User\AuthController;
use App\Http\Controllers\User\IndexController;
use App\Http\Controllers\User\LocationController;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Route;


Route::group(['prefix' => '/auth'], function () {

    Route::post('/token-request', [AuthController::class, 'otp_token']);
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/me', [UserController::class, 'me'])->middleware('auth:api');
    Route::post('/update-user', [UserController::class, 'update'])->middleware('auth:api');
    Route::post('/update-location', [UserController::class, 'update_location'])->middleware('auth:api');
    Route::post('/update-coordinates', [UserController::class, 'update_coordinates'])->middleware('auth:api');
});

Route::group(['prefix' => 'doctors'], function () {

    Route::post(('/'), [DoctorController::class, 'get_doctors']);
    Route::get(('/{id}'), [DoctorController::class, 'get_doctor']);
    Route::get(('/{id}/schedule'), [DoctorController::class, 'get_schedules']);
});

Route::group(['prefix' => 'index'], function () {

    Route::post(('/'), [IndexController::class, 'subject']);
    Route::post(('/recommend'), [IndexController::class, 'get_doctor']);
});
Route::group(['prefix' => 'locations'], function () {

    Route::get(('/'), [LocationController::class, 'get_locations']);
});

Route::group(['prefix' => 'appointments'], function () {

    Route::post(('/'), [AppointmentController::class, 'create_appointment'])->middleware('auth:api');
    Route::get(('/'), [AppointmentController::class, 'get_appointments'])->middleware('auth:api');
});
