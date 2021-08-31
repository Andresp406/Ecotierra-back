<?php

use App\Http\Controllers\Api\Auth\AuthController;

Route::post('login', [AuthController::class, 'login'])->name('login');
Route::get('me', [AuthController::class, 'me'])->middleware('auth:sanctum')->name('login');
