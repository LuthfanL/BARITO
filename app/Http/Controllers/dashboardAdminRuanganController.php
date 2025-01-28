<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ruangan;
use App\Models\customer;
use App\Models\adminRuangan;
use App\Models\pemRuangan;
use Illuminate\Support\Facades\Storage;

class dashboardAdminRuanganController extends Controller
{
    public function index(Request $request)
    {
        // Ambil pengguna yang sedang login
        $user = auth()->user();

        // Ambil idAdmin dari model adminRuangan berdasarkan email
        $idAdmin = adminRuangan::getIdAdminByEmail($user->email);

        if (!$idAdmin) {
            // Tangani error jika idAdmin tidak ditemukan
            return back()->with('error', 'Admin tidak ditemukan');
        }

        $ruangan = ruangan::all();
        $totalCustomer = customer::count();
        $totalRuangan = $ruangan->count(); // Hitung total ruangan

        // Hitung jumlah booking dengan status "Belum disetujui" atau "Disetujui"
        $totalBooking = pemRuangan::where('idAdmin', $idAdmin)
            ->whereIn('status', ['Belum disetujui', 'Disetujui'])
            ->count();

        // Hitung jumlah booking dengan status "Belum disetujui"
        $verifikasi = pemRuangan::where('idAdmin', $idAdmin)
        ->where('status', 'Belum disetujui')
        ->count();

        foreach ($ruangan as &$data) {
            if (!empty($data->foto)) {
                // Ambil URL gambar utama dan URL thumbnail
                $data->foto_url = Storage::url(json_decode($data->foto)[0]);
                $data->foto_urls = json_decode($data->foto); // Array foto untuk thumbnails
            } else {
                $data->foto_url = asset('default-image.jpg');
                $data->foto_urls = []; // Tidak ada thumbnail jika tidak ada foto
            }
        }
        
        // Kirim data ruangan dan total ruangan ke blade
        return view('dashboardAdminRuangan', compact('ruangan', 'totalRuangan', 'totalCustomer', 'totalBooking', 'verifikasi'));
    }
}
