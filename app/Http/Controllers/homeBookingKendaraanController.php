<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\kendaraan;

class homeBookingKendaraanController extends Controller
{
    public function index()
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

        return view('homeBookingKendaraan', compact('kendaraan'));
    }
}
