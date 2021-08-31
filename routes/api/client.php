<?php

use App\Http\Controllers\Api\Client\ClientController;

Route::get('', [ClientController::class, 'index'])->name('index');
Route::post('store', [ClientController::class, 'store'])->name('store');
