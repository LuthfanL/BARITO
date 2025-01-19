<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\loginController;
use App\Http\Controllers\registerController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\homeBookingRuanganController;
use App\Http\Controllers\homeBookingKendaraanController;
use App\Http\Controllers\homePengelolaanTenantController;
use App\Http\Controllers\custDaftarRuanganController;
use App\Http\Controllers\custDaftarKendaraanController;
use App\Http\Controllers\custDaftarEventController;
use App\Http\Controllers\custStatusBookingRuanganController;
use App\Http\Controllers\custStatusBookingKendaraanController;
use App\Http\Controllers\custStatusBookingTenantController;
use App\Http\Controllers\custBookingRuanganController;
use App\Http\Controllers\custBookingKendaraanController;
use App\Http\Controllers\custBookingTenantController;
use App\Http\Controllers\kontakRuanganController;
use App\Http\Controllers\kontakKendaraanController;
use App\Http\Controllers\kontakTenantController;
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

Route::get('/custDaftarRuangan', [custDaftarRuanganController::class, 'index'])->name('custDaftarRuangan');

Route::get('/custBookingRuangan', [custBookingRuanganController::class, 'index'])->name('custBookingRuangan');

Route::get('/custStatusBookingRuangan', [custStatusBookingRuanganController::class, 'index'])->name('custStatusBookingRuangan');

Route::get('/kontakRuangan', [kontakRuanganController::class, 'index'])->name('kontakRuangan');


# Customer Kendaraan ----------------------------------------------------
Route::get('/homeBookingKendaraan', [homeBookingKendaraanController::class, 'index'])->name('homeBookingKendaraan');

Route::get('/custDaftarKendaraan', [custDaftarKendaraanController::class, 'index'])->name('custDaftarKendaraan');

Route::get('/custBookingKendaraan', [custBookingKendaraanController::class, 'index'])->name('custBookingKendaraan');

Route::get('/custStatusBookingKendaraan', [custStatusBookingKendaraanController::class, 'index'])->name('custStatusBookingKendaraan');

Route::get('/kontakKendaraan', [kontakKendaraanController::class, 'index'])->name('kontakKendaraan');


# Customer tenant ----------------------------------------------------
Route::get('/homePengelolaanTenant', [homePengelolaanTenantController::class, 'index'])->name('homePengelolaanTenant');

Route::get('/custDaftarEvent', [custDaftarEventController::class, 'index'])->name('custDaftarEvent');

Route::get('/custStatusBookingTenant', [custStatusBookingTenantController::class, 'index'])->name('custStatusBookingTenant');

Route::get('/kontakTenant', [kontakTenantController::class, 'index'])->name('kontakTenant');


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