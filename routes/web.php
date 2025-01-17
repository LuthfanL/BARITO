<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\loginController;
use App\Http\Controllers\registerController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\profilController;
use App\Http\Controllers\dashboardAdminRuanganController;
use App\Http\Controllers\dashboardAdminKendaraanController;
use App\Http\Controllers\dashboardAdminTenantController;
use App\Http\Controllers\buatRuanganController;
use App\Http\Controllers\buatKendaraanController;
use App\Http\Controllers\daftarRuanganController;
use App\Http\Controllers\daftarKendaraanController;
use App\Http\Controllers\verifikasiBookingRuanganController;
use App\Http\Controllers\riwayatBookingRuanganController;


Route::get('/', function () {
    return view('home');
});

Route::get('/home', [homeController::class, 'index'])->name('home');

Route::get('/login', [loginController::class, 'index'])->name('login');
Route::post('/login', [loginController::class, 'login'])->name('masuk');
Route::get('/lupaPassword', [loginController::class, 'lupaPW'])->name('lupaPW');
Route::post('/lupaPassword', [loginController::class, 'updatePW'])->name('updatePW');

Route::get('/logout', [loginController::class, 'logout'])->name('logout')->middleware('auth');

Route::get('/register', [registerController::class, 'index'])->name('register');
Route::post('/registrasi', [registerController::class, 'store'])->name('registrasi');

Route::get('/profile', [profilController::class, 'index'])->name('profile')->middleware('auth');

Route::get('/dashboardAdminRuangan', [DashboardAdminRuanganController::class, 'index'])->name('dashboardAdminRuangan')->middleware('auth');

Route::get('/dashboardAdminKendaraan', [DashboardAdminKendaraanController::class, 'index'])->name('dashboardAdminKendaraan')->middleware('auth');

Route::get('/dashboardAdminTenant', [DashboardAdminTenantController::class, 'index'])->name('dashboardAdminTenant')->middleware('auth');

Route::get('/buatRuangan', [buatRuanganController::class, 'index'])->name('buatRuangan')->middleware('auth');

Route::get('/buatRuangan', [buatRuanganController::class, 'index'])->name('buatRuangan');

Route::get('/buatKendaraan', [buatKendaraanController::class, 'index'])->name('buatKendaraan');

Route::get('/daftarRuangan', [daftarRuanganController::class, 'index'])->name('daftarRuangan')->middleware('auth');

Route::get('/daftarKendaraan', [daftarKendaraanController::class, 'index'])->name('daftarKendaraan');

Route::get('/verifikasiBookingRuangan', [verifikasiBookingRuanganController::class, 'index'])->name('verifikasiBookingRuangan');

Route::get('/riwayatBookingRuangan', [riwayatBookingRuanganController::class, 'index'])->name('riwayatBookingRuangan');

