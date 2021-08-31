<?php

use App\Http\Controllers\Api\Sales\SalesController;

Route::post('store', [SalesController::class, 'store'])->name('store');
Route::get('filter/{start}/{end}', [SalesController::class, 'filter'])->name('filter');
Route::get('client/{client}', [SalesController::class, 'salesByClient'])->name('client');
