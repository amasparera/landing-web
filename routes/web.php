<?php

use App\Http\Controllers\FrondController;
use Illuminate\Support\Facades\Route;



Route::get('/', [FrondController::class, 'index'])->name('frond.index');
Route::get('/details', [FrondController::class, 'details'])->name('frond.index');
Route::get('/order', [FrondController::class, 'order'])->name('frond.index');
