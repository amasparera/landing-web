<?php

use App\Http\Controllers\FrondController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/admin');
});

// Route::get('/frond',[FrondController::class,'index'])->name('frond.index');