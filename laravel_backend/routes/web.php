<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PetController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PetFoodController;
use App\Http\Controllers\PetCategoryController;
use App\Http\Controllers\PetFoodCategoryController;
use App\Http\Controllers\PetClothesController;
use App\Http\Controllers\OrderController;
use App\Http\Middleware\CheckAdmin;

// Trang chủ
Route::get('/', function () {
    return view('welcome');
});

// Route đăng nhập
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Route quản trị (chỉ cho admin)
Route::middleware(['auth', CheckAdmin::class])->group(function () {
    // Trang dashboard
    Route::get('/admin', [AdminController::class, 'dashboard'])->name('admin.dashboard');

    // Trang profile admin
    Route::get('/admin/profile', [AdminController::class, 'profile'])->name('admin.profile');

    // Quản lý người dùng
    Route::resource('users', UserController::class);

    // Quản lý thú cưng
    Route::resource('pets', PetController::class);

    // Quản lí danh mục thú cưng
    Route::resource('pet_categories', PetCategoryController::class);

    // Quản lý thức ăn thú cưng
    Route::resource('pet-foods', PetFoodController::class);
    Route::resource('pet-food-categories', PetFoodCategoryController::class);

    // Quản lý thời trang thú cưng
    Route::resource('pet-clothes', PetClothesController::class);

    // Quản lý đơn hàng
    Route::resource('orders', OrderController::class);
});
