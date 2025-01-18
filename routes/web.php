<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\loginController;
use App\Http\Controllers\registerController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\homeBookingRuanganController;
use App\Http\Controllers\homeBookingKendaraanController;
use App\Http\Controllers\homePengelolaanTenantController;
use App\Http\Controllers\profilController;
use App\Http\Controllers\dashboardAdminRuanganController;
use App\Http\Controllers\dashboardAdminKendaraanController;
use App\Http\Controllers\dashboardAdminTenantController;
use App\Http\Controllers\buatRuanganController;
use App\Http\Controllers\buatKendaraanController;
use App\Http\Controllers\buatEventController;
use App\Http\Controllers\daftarRuanganController;
use App\Http\Controllers\daftarKendaraanController;
use App\Http\Controllers\daftarEventController;
use App\Http\Controllers\verifikasiBookingRuanganController;
use App\Http\Controllers\verifikasiBookingKendaraanController;
use App\Http\Controllers\verifikasiBookingTenantController;
use App\Http\Controllers\riwayatBookingRuanganController;
use App\Http\Controllers\riwayatBookingKendaraanController;
use App\Http\Controllers\riwayatBookingTenantController;


Route::get('/', function () {
    return view('home');
});

Route::get('/home', [homeController::class, 'index'])->name('home');

Route::get('/login', [loginController::class, 'index'])->name('login');
Route::post('/login', [loginController::class, 'login'])->name('masuk');
Route::get('/lupaPassword', [loginController::class, 'lupaPW'])->name('lupaPW');
Route::post('/lupaPassword', [loginController::class, 'updatePW'])->name('updatePW');

Route::get('/logout', [loginController::class, 'logout'])->name('logout');

Route::get('/register', [registerController::class, 'index'])->name('register');
Route::post('/registrasi', [registerController::class, 'store'])->name('registrasi');

# Customer ----------------------------------------------------
Route::get('/profile', [profilController::class, 'index'])->name('profile')->middleware('auth');


# Customer Ruangan ----------------------------------------------------
Route::get('/homeBookingRuangan', [homeBookingRuanganController::class, 'index'])->name('homeBookingRuangan');

# Customer Kendaraan ----------------------------------------------------
Route::get('/homeBookingKendaraan', [homeBookingKendaraanController::class, 'index'])->name('homeBookingKendaraan');

# Customer tenant ----------------------------------------------------
Route::get('/homePengelolaanTenant', [homePengelolaanTenantController::class, 'index'])->name('homePengelolaanTenant');

# Admin Ruangan -----------------------------------------------------
Route::get('/dashboardAdminRuangan', [DashboardAdminRuanganController::class, 'index'])->name('dashboardAdminRuangan');

// Route::get('/buatRuangan', [buatRuanganController::class, 'index'])->name('buatRuangan')->middleware('auth');

Route::get('/buatRuangan', [buatRuanganController::class, 'index'])->name('buatRuangan');

Route::get('/daftarRuangan', [daftarRuanganController::class, 'index'])->name('daftarRuangan');

Route::get('/verifikasiBookingRuangan', [verifikasiBookingRuanganController::class, 'index'])->name('verifikasiBookingRuangan');

Route::get('/riwayatBookingRuangan', [riwayatBookingRuanganController::class, 'index'])->name('riwayatBookingRuangan');


# Admin Kendaraan ----------------------------------------------------
Route::get('/dashboardAdminKendaraan', [DashboardAdminKendaraanController::class, 'index'])->name('dashboardAdminKendaraan');

Route::get('/buatKendaraan', [buatKendaraanController::class, 'index'])->name('buatKendaraan');

Route::get('/daftarKendaraan', [daftarKendaraanController::class, 'index'])->name('daftarKendaraan');

Route::get('/verifikasiBookingKendaraan', [verifikasiBookingKendaraanController::class, 'index'])->name('verifikasiBookingKendaraan');

Route::get('/riwayatBookingKendaraan', [riwayatBookingKendaraanController::class, 'index'])->name('riwayatBookingKendaraan');


# Admin Tenant -------------------------------------------------------
Route::get('/dashboardAdminTenant', [DashboardAdminTenantController::class, 'index'])->name('dashboardAdminTenant');

Route::get('/buatEvent', [buatEventController::class, 'index'])->name('buatEvent');

Route::get('/daftarEvent', [daftarEventController::class, 'index'])->name('daftarEvent');

Route::get('/verifikasiBookingTenant', [verifikasiBookingTenantController::class, 'index'])->name('verifikasiBookingTenant');

Route::get('/riwayatBookingTenant', [riwayatBookingTenantController::class, 'index'])->name('riwayatBookingTenant');