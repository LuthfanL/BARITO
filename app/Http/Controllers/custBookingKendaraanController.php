<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\kendaraan;
use Illuminate\Support\Facades\Storage;

class custBookingKendaraanController extends Controller
{
    public function index(Request $request)
    {
        // Ambil parameter 'nama', 'lokasi', dan 'deskripsi' dari URL
        $nama = $request->input('nama');
        $platNomor = $request->input('platNomor');

        // Ambil data ruangan berdasarkan 'nama', 'lokasi', dan 'deskripsi'
        $kendaraan = kendaraan::where('nama', $nama)
                            ->where('platNomor', $platNomor)
                            ->first();

        // Mengambil URL gambar utama dan URL thumbnail
        if (!empty($kendaraan->foto)) {
            $kendaraan->foto_url = Storage::url(json_decode($kendaraan->foto)[0]);  
            $kendaraan->foto_urls = json_decode($kendaraan->foto); 
        } else {
            $kendaraan->foto_url = asset('default-image.jpg');
            $kendaraan->foto_urls = []; // Tidak ada thumbnail jika tidak ada foto
        }

        // Kirim data ruangan ke view
        return view('custBookingKendaraan', compact('kendaraan'));
    }
}
