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

Route::get('/', function(){
    return view('/home');
});

Route::get('/', [homeController::class, 'index'])->name('home');

Route::get('/login', [loginController::class, 'index'])->name('login');
Route::post('/login', [loginController::class, 'login'])->name('masuk');
Route::get('/lupaPassword', [loginController::class, 'lupaPW'])->name('lupaPW');
Route::post('/lupaPassword', [loginController::class, 'updatePW'])->name('updatePW');

Route::get('/logout', [loginController::class, 'logout'])->name('logout');

Route::get('/register', [registerController::class, 'index'])->name('register');
Route::post('/registrasi', [registerController::class, 'store'])->name('registrasi');


# Customer ----------------------------------------------------
Route::get('/profile', [profilController::class, 'index'])->name('profile')->middleware('auth');
Route::get('/editProfile', [profilController::class, 'edit'])->name('editProfile')->middleware('auth');
Route::post('/saveEdit', [profilController::class, 'save'])->name('editSave')->middleware('auth');
Route::get('/hapusAkun', [profilController::class, 'hapus'])->name('hapusAkun')->middleware('auth');


# Customer Ruangan ----------------------------------------------------
Route::get('/homeBookingRuangan', [homeBookingRuanganController::class, 'index'])->name('homeBookingRuangan');

Route::get('/custDaftarRuangan', [custDaftarRuanganController::class, 'index'])->name('custDaftarRuangan');

Route::get('/custBookingRuangan', [custBookingRuanganController::class, 'index'])->name('custBookingRuangan')->middleware('auth');

Route::get('/custStatusBookingRuangan', [custStatusBookingRuanganController::class, 'index'])->name('custStatusBookingRuangan')->middleware('auth');

Route::put('/updateBookingRuangan', [custStatusBookingRuanganController::class, 'updateBookingRuangan'])->name('updateBookingRuangan');

Route::post('/custBuktiBayarPemRuangan', [custStatusBookingRuanganController::class, 'uploadBukti'])->name('booking.uploadBuktiRuang')->middleware('auth');

Route::delete('/hapusPemRuangan/{id}', [custStatusBookingRuanganController::class, 'destroy'])->name('pemRuangan.destroy')->middleware('auth');

Route::post('/booking-ruangan', [CustBookingRuanganController::class, 'store'])->name('bookingRuangan.store')->middleware('auth');

Route::get('/kontakRuangan', [kontakRuanganController::class, 'index'])->name('kontakRuangan');

// Route::get('/cari-Ruangan', [custDaftarRuanganController::class, 'cari'])->name('cariRuangan')->middleware('auth');

# Customer Kendaraan ----------------------------------------------------
Route::get('/homeBookingKendaraan', [homeBookingKendaraanController::class, 'index'])->name('homeBookingKendaraan');

Route::get('/custDaftarKendaraan', [custDaftarKendaraanController::class, 'index'])->name('custDaftarKendaraan');

Route::get('/custBookingKendaraan', [custBookingKendaraanController::class, 'index'])->name('custBookingKendaraan')->middleware('auth');

Route::get('/custStatusBookingKendaraan', [custStatusBookingKendaraanController::class, 'index'])->name('custStatusBookingKendaraan')->middleware('auth');

Route::put('/updateBookingKendaraan', [custStatusBookingKendaraanController::class, 'updateBookingKendaraan'])->name('updateBookingKendaraan');

Route::post('/custBuktiBayarPemKendaraan', [custStatusBookingKendaraanController::class, 'uploadBukti'])->name('booking.uploadBukti')->middleware('auth');

Route::delete('/hapusPemKendaraan/{id}', [custStatusBookingKendaraanController::class, 'destroy'])->name('pemKendaraan.destroy')->middleware('auth');

Route::get('/kontakKendaraan', [kontakKendaraanController::class, 'index'])->name('kontakKendaraan');

// Route::get('/cari-Kendaraan', [custDaftarKendaraanController::class, 'cari'])->name('cariKendaraan')->middleware('auth');

Route::post('/booking-kendaraan', [CustBookingKendaraanController::class, 'store'])->name('bookingKendaraan.store')->middleware('auth');

# Customer tenant ----------------------------------------------------
Route::get('/homePengelolaanTenant', [homePengelolaanTenantController::class, 'index'])->name('homePengelolaanTenant');

Route::get('/custDaftarEvent', [custDaftarEventController::class, 'index'])->name('custDaftarEvent');

Route::get('/custBookingTenant', [custBookingTenantController::class, 'index'])->name('custBookingTenant')->middleware('auth');

Route::get('/custStatusBookingTenant', [custStatusBookingTenantController::class, 'index'])->name('custStatusBookingTenant')->middleware('auth');

Route::put('/updateBookingTenant', [custStatusBookingTenantController::class, 'updateBookingTenant'])->name('updateBookingTenant');

Route::post('/custBuktiBayarPemTenant', [custStatusBookingTenantController::class, 'uploadBukti'])->name('booking.uploadBuktiTenant')->middleware('auth');

Route::delete('/hapusPemTenant/{id}', [custStatusBookingTenantController::class, 'destroy'])->name('pemTenant.destroy')->middleware('auth');

Route::post('/booking-tenant', [CustBookingTenantController::class, 'store'])->name('bookingTenant.store')->middleware('auth');

Route::get('/kontakTenant', [kontakTenantController::class, 'index'])->name('kontakTenant');


# Admin Ruangan -----------------------------------------------------
Route::get('/dashboardAdminRuangan', [DashboardAdminRuanganController::class, 'index'])->name('dashboardAdminRuangan')->middleware('auth');

Route::get('/ruangan', [daftarRuanganController::class, 'index'])->name('daftarRuangan')->middleware('auth');

Route::get('/buatRuangan', [buatRuanganController::class, 'index'])->name('buatRuangan')->middleware('auth');
Route::post('/buatRuangan', [buatRuanganController::class, 'store'])->name('ruangan.store')->middleware('auth');

Route::resource('/daftarRuangan', daftarRuanganController::class)->middleware('auth');

// Route::get('/cari-ruangan', [daftarRuanganController::class, 'search'])->name('searchRuangan')->middleware('auth');

Route::delete('/ruangan/{id}', [daftarRuanganController::class, 'destroy'])->name('ruangan.destroy');

Route::put('/update-ruangan', [daftarRuanganController::class, 'update'])->name('update.ruangan');

Route::get('/verifikasiBookingRuangan', [verifikasiBookingRuanganController::class, 'index'])->name('verifikasiBookingRuangan')->middleware('auth');

Route::post('/updateStatusRuangan', [VerifikasiBookingRuanganController::class, 'updateStat'])->name('upStatusRuangan');

Route::get('/riwayatBookingRuangan', [riwayatBookingRuanganController::class, 'index'])->name('riwayatBookingRuangan')->middleware('auth');

# Admin Kendaraan ----------------------------------------------------
Route::get('/dashboardAdminKendaraan', [DashboardAdminKendaraanController::class, 'index'])->name('dashboardAdminKendaraan')->middleware('auth');

Route::get('/kendaraan', [daftarKendaraanController::class, 'index'])->name('daftarKendaraan')->middleware('auth');

Route::get('/buatKendaraan', [buatKendaraanController::class, 'index'])->name('buatKendaraan')->middleware('auth');
Route::post('/buatKendaraan', [buatKendaraanController::class, 'store'])->name('kendaraan.store')->middleware('auth');

Route::resource('/daftarKendaraan', daftarKendaraanController::class)->middleware('auth');
//Route::get('/daftarKendaraan', [daftarKendaraanController::class, 'index'])->name('daftarKendaraan');

// Route::get('/cari-kendaraan', [daftarKendaraanController::class, 'search'])->name('searchKendaraan')->middleware('auth');

Route::delete('/kendaraan/{platNomor}', [daftarKendaraanController::class, 'destroy'])->name('kendaraan.destroy')->middleware('auth');

Route::put('/update-kendaraan', [daftarKendaraanController::class, 'update'])->name('update.kendaraan');

Route::get('/verifikasiBookingKendaraan', [verifikasiBookingKendaraanController::class, 'index'])->name('verifikasiBookingKendaraan')->middleware('auth');

Route::post('/updateStatusKendaraan', [verifikasiBookingKendaraanController::class, 'updateStatus'])->name('update.status');

Route::get('/riwayatBookingKendaraan', [riwayatBookingKendaraanController::class, 'index'])->name('riwayatBookingKendaraan')->middleware('auth');


# Admin Tenant -------------------------------------------------------
Route::get('/dashboardAdminTenant', [DashboardAdminTenantController::class, 'index'])->name('dashboardAdminTenant')->middleware('auth');

Route::get('/event', [daftarEventController::class, 'index'])->name('daftarEvent')->middleware('auth');

Route::get('/buatEvent', [buatEventController::class, 'index'])->name('buatEvent')->middleware('auth');
Route::post('/buatEvent', [buatEventController::class, 'store'])->name('event.store')->middleware('auth');

Route::resource('/daftarEvent', daftarEventController::class)->middleware('auth');

// Route::get('/cari-event', [daftarEventController::class, 'search'])->name('searchEvent')->middleware('auth');

Route::delete('/event/{namaEvent}', [daftarEventController::class, 'destroy'])->name('event.destroy');

Route::put('/update-event', [daftarEventController::class, 'update'])->name('update.event');

Route::get('/verifikasiBookingTenant', [verifikasiBookingTenantController::class, 'index'])->name('verifikasiBookingTenant')->middleware('auth');

Route::post('/updateStatusTenant', [verifikasiBookingTenantController::class, 'updateStatus'])->name('update.statusTenant');

Route::get('/riwayatBookingTenant', [riwayatBookingTenantController::class, 'index'])->name('riwayatBookingTenant')->middleware('auth');