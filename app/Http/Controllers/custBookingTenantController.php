<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\event;
use Illuminate\Support\Facades\Storage;

class custBookingTenantController extends Controller
{
    public function index(Request $request)
    {
        // Ambil parameter 'nama', 'lokasi', dan 'deskripsi' dari URL
        $namaEvent = $request->input('namaEvent');

        // Ambil data ruangan berdasarkan 'nama', 'lokasi', dan 'deskripsi'
        $event = event::where('namaEvent', $namaEvent)->first();

        $calendarEvents = Event::select('namaEvent as title', 'tglMulai as start', 'tglSelesai as end')->get()->map(function ($event) {
            $event->color = '#3788d8';
            return $event;
        });

        $calendarEventsJson = json_encode($calendarEvents);

        // Mengambil URL gambar utama dan URL thumbnail
        if (!empty($event->foto)) {
            $event->foto_url = Storage::url(json_decode($event->foto)[0]);  
            $event->foto_urls = json_decode($event->foto); 
        } else {
            $event->foto_url = asset('default-image.jpg');
            $event->foto_urls = []; // Tidak ada thumbnail jika tidak ada foto
        }

        // Kirim data ruangan ke view
        return view('custBookingTenant', compact('event', 'calendarEventsJson'));
    }
}
