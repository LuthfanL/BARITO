<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\kendaraan;
use App\Models\customer;
use App\Models\adminKendaraan;
use App\Models\pemKendaraan;
use Illuminate\Support\Facades\Storage;

class dashboardAdminKendaraanController extends Controller
{
    public function index(Request $request)
    {
        // Ambil pengguna yang sedang login
        $user = auth()->user();

        // Ambil idAdmin dari model adminKendaraan berdasarkan email
        $idAdmin = adminKendaraan::getIdAdminByEmail($user->email);

        if (!$idAdmin) {
            // Tangani error jika idAdmin tidak ditemukan
            return back()->with('error', 'Admin tidak ditemukan');
        }

        $kendaraan = kendaraan::all();
        $totalCustomer = customer::count();
        $totalKendaraan = $kendaraan->count(); // Hitung total kendaraan

        // Hitung jumlah booking dengan status "Belum disetujui" atau "Disetujui"
        $totalBooking = pemKendaraan::where('idAdmin', $idAdmin)
            ->whereIn('status', ['Belum disetujui', 'Disetujui'])
            ->count();

        // Hitung jumlah booking dengan status "Belum disetujui"
        $verifikasi = pemKendaraan::where('idAdmin', $idAdmin)
            ->where('status', 'Belum disetujui')
            ->count();

        foreach ($kendaraan as &$data) {
            if (!empty($data->foto)) {
                // Ambil URL gambar utama dan URL thumbnail
                $data->foto_url = Storage::url(json_decode($data->foto)[0]);
                $data->foto_urls = json_decode($data->foto); // Array foto untuk thumbnails
            } else {
                $data->foto_url = asset('default-image.jpg');
                $data->foto_urls = []; // Tidak ada thumbnail jika tidak ada foto
            }
        }

        // Kirim data ke blade
        return view('dashboardAdminKendaraan', compact('kendaraan', 'totalKendaraan', 'totalCustomer', 'totalBooking', 'verifikasi'));
    }
}