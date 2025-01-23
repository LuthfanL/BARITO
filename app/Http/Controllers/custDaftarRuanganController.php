<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ruangan;
use Illuminate\Support\Facades\Storage;

class custDaftarRuanganController extends Controller
{
    public function index(Request $request)
    {
        $ruangan = ruangan::all();

        foreach ($ruangan as &$ruang) {
            if (!empty($ruang->foto)) {
                // Ambil URL gambar utama dan URL thumbnail
                $ruang->foto_url = Storage::url(json_decode($ruang->foto)[0]);
                $ruang->foto_urls = json_decode($ruang->foto); // Array foto untuk thumbnails
            } else {
                $ruang->foto_url = asset('default-image.jpg');
                $ruang->foto_urls = []; // Tidak ada thumbnail jika tidak ada foto
            }
        }
        return view('custDaftarRuangan', compact('ruangan'));
    }
}
