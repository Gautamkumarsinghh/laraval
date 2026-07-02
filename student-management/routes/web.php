<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

Route::get('/', [LoginController::class,'index']);
Route::post('/login', [LoginController::class,'login']);
Route::get('/dashboard',[LoginController::class,'dashboard']);
Route::get('/logout',[LoginController::class,'logout']);
