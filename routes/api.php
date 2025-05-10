<?php

use App\Http\Controllers\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return [
        'user' => 'John Doe',
        'message' => 'Hello, this is a test message!'
    ];
});


Route::resource('posts', PostController::class)->only(['index', 'show']);
