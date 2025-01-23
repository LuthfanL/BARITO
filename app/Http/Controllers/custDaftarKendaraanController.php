<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\kendaraan;
use Illuminate\Support\Facades\Storage;

class custDaftarKendaraanController extends Controller
{
    public function index(Request $request)
    {

        $kendaraan = kendaraan::all();
        
        foreach ($kendaraan as &$kendara) {
            if (!empty($kendara->foto)) {
                // Ambil URL gambar utama dan URL thumbnail
                $kendara->foto_url = Storage::url(json_decode($kendara->foto)[0]);
                $kendara->foto_urls = json_decode($kendara->foto); // Array foto untuk thumbnails
            } else {
                $kendara->foto_url = asset('default-image.jpg');
                $kendara->foto_urls = []; // Tidak ada thumbnail jika tidak ada foto
            }
        }
        
        // Mengirim data ke view
        return view('custDaftarKendaraan', compact('kendaraan'));
    }

    public function search(Request $request)
    {
        // Tangkap input pencarian
        $keyword = $request->input('keyword');
        
        // Jika ada pencarian, cari berdasarkan nama atau platNomor
        if ($keyword) {
            $kendaraan = kendaraan::where('nama', 'like', "%{$keyword}%")
                ->get(); // Ambil data kendaraan yang sesuai dengan pencarian
        } else {
            // Jika tidak ada pencarian, ambil semua data kendaraan
            $kendaraan = kendaraan::all(); // Mengambil semua kendaraan
        }
    
        // Kirim data ke view
        return view('custDaftarKendaraan', compact('kendaraan', 'keyword'));
    }
}
