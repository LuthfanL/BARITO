<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\event;

class homePengelolaanTenantController extends Controller
{
    public function index()
    {
        $events = event::all();

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

        return view('homePengelolaanTenant', compact('events'));
    }
}
