<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\event;
use Illuminate\Support\Facades\Storage;

class custDaftarEventController extends Controller
{
    public function index(Request $request)
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

        return view('custDaftarEvent', compact('events'));
    }
}
