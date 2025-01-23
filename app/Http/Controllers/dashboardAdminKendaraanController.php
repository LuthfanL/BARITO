<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\kendaraan;
use Illuminate\Support\Facades\Storage;

class dashboardAdminKendaraanController extends Controller
{
    public function index(Request $request)
    {
        $kendaraan = kendaraan::all();
        $totalKendaraan = $kendaraan->count(); // Hitung total kendaraan
        
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
        
        // Kirim data kendaraan dan total kendaraan ke blade
        return view('dashboardAdminKendaraan', compact('kendaraan', 'totalKendaraan'));
    }
}