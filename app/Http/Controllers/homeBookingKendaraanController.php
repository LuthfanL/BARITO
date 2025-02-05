<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\kendaraan;
use App\Models\pemKendaraan;

class homeBookingKendaraanController extends Controller
{
    public function index()
    {
        // Ambil data jumlah peminjaman per kendaraan berdasarkan platNomor dan urutkan dari yang terbanyak
        $kendaraanTerfavorit = PemKendaraan::selectRaw('idKendaraan, COUNT(*) as total')
            ->whereIn('status', ['Menunggu persetujuan', 'Disetujui'])
            ->groupBy('idKendaraan')
            ->orderByDesc('total')
            ->limit(4) // Ambil maksimal 4 kendaraan
            ->get();

        // Ambil platNomor kendaraan yang sudah diurutkan
        $platNomorList = $kendaraanTerfavorit->pluck('idKendaraan')->toArray();

        // Ambil data kendaraan berdasarkan platNomor, tetapi gunakan platNomor sebagai ID
        $kendaraan = Kendaraan::whereIn('platNomor', $platNomorList)->get()->keyBy('platNomor');

        // Urutkan kendaraan sesuai jumlah peminjaman
        $kendaraan = collect($platNomorList)->map(function ($platNomor) use ($kendaraan, $kendaraanTerfavorit) {
            if (isset($kendaraan[$platNomor])) {
                $kendara = $kendaraan[$platNomor];

                // Tambahkan total peminjaman ke dalam objek kendaraan
                $kendara->total_peminjaman = $kendaraanTerfavorit->where('idKendaraan', $platNomor)->first()->total ?? 0;

                // Ambil URL gambar utama dan URL thumbnail
                if (!empty($kendara->foto)) {
                    $kendara->foto_url = Storage::url(json_decode($kendara->foto)[0]);
                    $kendara->foto_urls = json_decode($kendara->foto);
                } else {
                    $kendara->foto_url = asset('default-image.jpg');
                    $kendara->foto_urls = [];
                }

                return $kendara;
            }
        })->filter();

        // Jika jumlah kendaraan kurang dari 2, tambahkan kendaraan lain secara acak
        if ($kendaraan->count() < 1) {
            $tambahanKendaraan = Kendaraan::whereNotIn('platNomor', $platNomorList)->inRandomOrder()->limit(2 - $kendaraan->count())->get();
            $kendaraan = $kendaraan->merge($tambahanKendaraan);
        }

        return view('homeBookingKendaraan', compact('kendaraan'));
    }
}
