<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\loginController;
use App\Http\Controllers\registerController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\dashboardAdminRuanganController;
use App\Http\Controllers\dashboardAdminKendaraanController;
use App\Http\Controllers\dashboardAdminTenantController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [loginController::class, 'index'])->name('login');

Route::get('/register', [registerController::class, 'index'])->name('register');

Route::get('/home', [homeController::class, 'index'])->name('home');

Route::get('/dashboardAdminRuangan', [DashboardAdminRuanganController::class, 'index'])->name('dashboardAdminRuangan');

Route::get('/dashboardAdminKendaraan', [DashboardAdminKendaraanController::class, 'index'])->name('dashboardAdminKendaraan');

Route::get('/dashboardAdminTenant', [DashboardAdminTenantController::class, 'index'])->name('dashboardAdminTenant');