<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ruangan;
use Illuminate\Support\Facades\Storage;

class dashboardAdminRuanganController extends Controller
{
    public function index(Request $request)
    {
        $ruangan = ruangan::all();
        $totalRuangan = $ruangan->count(); // Hitung total ruangan
        
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
        return view('dashboardAdminRuangan', compact('ruangan', 'totalRuangan'));
    }
}
