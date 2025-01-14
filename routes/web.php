<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\loginController;
use App\Http\Controllers\registerController;
use App\Http\Controllers\dashboardAdminRuanganController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [loginController::class, 'index'])->name('login');
Route::get('/register', [registerController::class, 'index'])->name('register');

Route::get('/dashboardAdminRuangan', [DashboardAdminRuanganController::class, 'index'])->name('dashboardAdminRuangan');