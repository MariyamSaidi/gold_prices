<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GoldPricesController;
Route::get('/', function () {
    return view('welcome');
});
Route::get('/dashboard', [GoldPricesController::class, 'index'])->name('gold-prices.index');
Route::post('/dashboard', [GoldPricesController::class, 'store'])->name('gold-prices.store');

