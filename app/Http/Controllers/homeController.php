<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\event;
use App\Models\kendaraan;
use App\Models\ruangan;
use App\Models\customer;
use Illuminate\Support\Facades\Storage;

class homeController extends Controller
{
    public function index()
    {
        $events = event::all();
        $kendaraan = kendaraan::all();
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

        foreach ($events as &$evt) {
            if (!empty($evt->foto)) {
                // Ambil URL gambar utama dan URL thumbnail
                $evt->foto_url = Storage::url(json_decode($evt->foto)[0]);
                $evt->foto_urls = json_decode($evt->foto); // Array foto untuk thumbnails
            } else {
                $evt->foto_url = asset('default-image.jpg');
                $evt->foto_urls = []; // Tidak ada thumbnail jika tidak ada foto
            }
        }

        return view('home', compact('events', 'kendaraan', 'ruangan'));
    }
}
