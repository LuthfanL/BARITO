<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\event;
use App\Models\pemTenant;

class homePengelolaanTenantController extends Controller
{
    // public function index()
    // {
    //     $events = event::all();

    //     foreach ($events as &$evt) {
    //         if (!empty($evt->foto)) {
    //             // Ambil URL gambar utama dan URL thumbnail
    //             $evt->foto_url = Storage::url(json_decode($evt->foto)[0]);
    //             $evt->foto_urls = json_decode($evt->foto); // Array foto untuk thumbnails
    //         } else {
    //             $evt->foto_url = asset('default-image.jpg');
    //             $evt->foto_urls = []; // Tidak ada thumbnail jika tidak ada foto
    //         }
    //     }

    //     return view('homePengelolaanTenant', compact('events'));
    // }

    public function index()
    {
        // Ambil event dengan jumlah penyewa terbanyak
        $eventTerfavorit = pemTenant::selectRaw('namaEvent, COUNT(*) as total')
            ->whereIn('status', ['Menunggu persetujuan', 'Disetujui'])
            ->groupBy('namaEvent')
            ->orderByDesc('total')
            ->limit(4) // Ambil maksimal 4 event favorit
            ->get();

        // Jika belum ada peminjaman, ambil semua kendaraan dengan batas 4
        if ($eventTerfavorit->isEmpty()) {
            $events = Event::limit(4)->get()->map(function ($events) {
                $events->total_peminjaman = 0; // Set total peminjaman ke 0
                $events->foto_urls = !empty($events->foto) ? json_decode($events->foto) : [];
                $events->foto_url = !empty($events->foto_urls) ? Storage::url($events->foto_urls[0]) : asset('default-image.jpg');
                return $events;
            });

            return view('homePengelolaanTenant', compact('events'));
        }   

        // Ambil daftar event_id yang sudah diurutkan
        $eventIdList = $eventTerfavorit->pluck('namaEvent')->toArray();

        // Ambil data event berdasarkan ID
        $events = Event::whereIn('namaEvent', $eventIdList)->get()->keyBy('namaEvent');

        // Urutkan sesuai jumlah partisipasi
        $events = collect($eventIdList)->map(function ($namaEvent) use ($events, $eventTerfavorit) {
            if (isset($events[$namaEvent])) {
                $evt = $events[$namaEvent];

                // Tambahkan total partisipasi ke dalam objek event
                $evt->total_peminjaman = $eventTerfavorit->where('namaEvent', $namaEvent)->first()->total ?? 0;

                // Ambil URL gambar utama dan URL thumbnail
                if (!empty($evt->foto)) {
                    $evt->foto_url = Storage::url(json_decode($evt->foto)[0]);
                    $evt->foto_urls = json_decode($evt->foto);
                } else {
                    $evt->foto_url = asset('default-image.jpg');
                    $evt->foto_urls = [];
                }

                return $evt;
            }
        })->filter();

        // Jika event kurang dari 2, tambahkan event lain secara acak
        if ($events->count() < 1) {
            $tambahanEvent = Event::whereNotIn('namaEvent', $eventIdList)->inRandomOrder()->limit(2 - $events->count())->get();
            $events = $events->merge($tambahanEvent);
        }

        return view('homePengelolaanTenant', compact('events'));
    }
}
