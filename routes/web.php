<?php

use App\Http\Controllers\User\IndexController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {

    // Artisan::command("migrate:fresh --seed"); 

    return view('welcome');
});

Route::get('/s', function () {
    Artisan::call('migrate:fresh', [
        '--seed' => true,
    ]);

    return view('welcome');
});

// Route::middleware('web')->post('/', [IndexController::class, 'subject']);
