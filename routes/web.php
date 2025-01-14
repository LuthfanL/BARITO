<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\dashboardAdminRuanganController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboardAdminRuangan', [DashboardAdminRuanganController::class, 'index'])->name('dashboardAdminRuangan');