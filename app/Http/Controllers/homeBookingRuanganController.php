<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Ruangan;
use App\Models\PemRuangan;

class homeBookingRuanganController extends Controller
{
    public function index()
    {
        // Ambil data jumlah peminjaman per ruangan dan urutkan dari yang terbanyak
        $ruanganTerfavorit = PemRuangan::selectRaw('idRuangan, COUNT(*) as total')
            ->whereIn('status', ['Menunggu persetujuan', 'Disetujui'])
            ->groupBy('idRuangan')
            ->orderByDesc('total')
            ->limit(4) // Ambil maksimal 4 ruangan
            ->get();

        // Ambil ID ruangan yang sudah diurutkan
        $ruanganIds = $ruanganTerfavorit->pluck('idRuangan')->toArray();

        // Ambil data ruangan dengan mempertahankan urutan berdasarkan jumlah peminjaman
        $ruangan = Ruangan::whereIn('id', $ruanganIds)->get()->keyBy('id');

        // Urutkan ruangan sesuai urutan jumlah peminjaman
        $ruangan = collect($ruanganIds)->map(function ($id) use ($ruangan, $ruanganTerfavorit) {
            if (isset($ruangan[$id])) {
                $ruang = $ruangan[$id];

                // Tambahkan total peminjaman ke dalam objek ruangan
                $ruang->total_peminjaman = $ruanganTerfavorit->where('idRuangan', $id)->first()->total ?? 0;

                // Ambil URL gambar utama dan URL thumbnail
                if (!empty($ruang->foto)) {
                    $ruang->foto_url = Storage::url(json_decode($ruang->foto)[0]);
                    $ruang->foto_urls = json_decode($ruang->foto);
                } else {
                    $ruang->foto_url = asset('default-image.jpg');
                    $ruang->foto_urls = [];
                }

                return $ruang;
            }
        })->filter();

        // Jika jumlah ruangan kurang dari 2, tambahkan ruangan lain secara acak
        if ($ruangan->count() < 1) {
            $tambahanRuangan = Ruangan::whereNotIn('id', $ruanganIds)->inRandomOrder()->limit(2 - $ruangan->count())->get();
            $ruangan = $ruangan->merge($tambahanRuangan);
        }

        return view('homeBookingRuangan', compact('ruangan'));
    }
}
