<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// Users Routes
Route::middleware(['auth', 'authUser:user'])->group(function () {
    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');
});

// Manager Routes
Route::middleware(['auth', 'authUser:manager'])->group(function () {  
    Route::get('/manager/dashboard', [HomeController::class, 'managerDashboard'])->name('manager.dashboard');
});  

// Super Admin Routes
Route::middleware(['auth', 'authUser:super-admin'])->group(function () {
    Route::get('/admin/dashboard', [HomeController::class, 'adminDashboard'])->name('admin.dashboard');
});
