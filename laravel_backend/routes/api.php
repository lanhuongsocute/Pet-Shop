<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

// Định nghĩa route API
Route::middleware('api')->group(function () {
    // API Đăng ký
    // Route cho đăng nhập API
    Route::post('/login', [AuthController::class, 'apiLogin']);
    Route::post('/signup', [AuthController::class, 'signup']);
});
