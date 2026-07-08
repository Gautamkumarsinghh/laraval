<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CalculatorController;

Route::get('/', function () {
    return view('welcome');
});

// Login Routes
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Calculator Routes
Route::get('/calculator', [CalculatorController::class, 'index'])->name('calculator');
Route::post('/calculate', [CalculatorController::class, 'calculate']);

// Protected Routes (sirf logged in users ke liye)
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
