<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\kendaraan;
use App\Models\customer;
use App\Models\adminKendaraan;
use App\Models\pemKendaraan;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class dashboardAdminKendaraanController extends Controller
{
    public function index(Request $request)
    {
        // Ambil pengguna yang sedang login
        $user = auth()->user();

        // Ambil idAdmin dari model adminKendaraan berdasarkan email
        $idAdmin = adminKendaraan::getIdAdminByEmail($user->email);

        if (!$idAdmin) {
            // Tangani error jika idAdmin tidak ditemukan
            return back()->with('error', 'Admin tidak ditemukan');
        }

        $kendaraan = kendaraan::all();
        $totalCustomer = pemKendaraan::where('status', 'Disetujui')->distinct('idCustomer')->count('idCustomer');
        $totalKendaraan = $kendaraan->count(); // Hitung total kendaraan

        // Hitung jumlah booking dengan status "Menunggu persetujuan" atau "Disetujui"
        $totalBooking = pemKendaraan::where('idAdmin', $idAdmin)
            ->whereIn('status', ['Menunggu persetujuan', 'Disetujui'])
            ->count();

        // Hitung jumlah booking dengan status "Menunggu persetujuan"
        $verifikasi = pemKendaraan::where('idAdmin', $idAdmin)
            ->where('status', 'Menunggu persetujuan')
            ->count();

        foreach ($kendaraan as &$data) {
            if (!empty($data->foto)) {
                // Ambil URL gambar utama dan URL thumbnail
                $data->foto_url = Storage::url(json_decode($data->foto)[0]);
                $data->foto_urls = json_decode($data->foto); // Array foto untuk thumbnails
            } else {
                $data->foto_url = asset('default-image.jpg');
                $data->foto_urls = []; // Tidak ada thumbnail jika tidak ada foto
            }
        }

        // STATISTIK
        $periode = $request->query('periode', '7 hari terakhir'); // Default: 7 hari terakhir
        $startDate = now();
        $endDate = now();

        switch (strtolower($periode)) {
            case 'kemarin':
                $startDate = now()->subDay()->startOfDay();
                $endDate = now()->subDay()->endOfDay();
                break;
            case 'hari ini':
                $startDate = now()->startOfDay();
                $endDate = now()->endOfDay();
                break;
            case '7 hari terakhir':
                $startDate = now()->subDays(7)->startOfDay();
                $endDate = now()->endOfDay();
                break;
            case '30 hari terakhir':
                $startDate = now()->subDays(30)->startOfDay();
                $endDate = now()->endOfDay();
                break;
        }

        // Statistik Peminjaman Lingkaran
        $peminjamanData = pemKendaraan::where('idAdmin', $idAdmin)
            ->whereIn('status', ['Menunggu persetujuan', 'Disetujui'])
            ->whereBetween('created_at', [$startDate, $endDate])
            ->selectRaw('namaKendaraan, COUNT(*) as total')
            ->groupBy('namaKendaraan')
            ->get();

        $labels = $peminjamanData->pluck('namaKendaraan');
        $data = $peminjamanData->pluck('total');

        // Jika request AJAX, kirim data dalam format JSON
        if ($request->ajax()) {
            return response()->json([
                'labels' => $labels,
                'data' => $data
            ]);
        }

        // Statistik Pengunjung
        $pengunjungData = pemKendaraan::where('idAdmin', $idAdmin)
        ->whereIn('status', ['Menunggu persetujuan', 'Disetujui'])
        ->whereBetween('created_at', [$startDate, $endDate])
        ->selectRaw('DATE(created_at) as date, COUNT(*) as total')
        ->groupBy('date')
        ->get()
        ->pluck('total', 'date'); // Menggunakan pluck untuk mendapatkan array tanggal dan total booking

        // Buat daftar tanggal lengkap dalam periode yang dipilih
        $allDates = collect();
        $currentDate = $startDate->copy();

        while ($currentDate <= $endDate) {
        $allDates->put($currentDate->toDateString(), 0);
        $currentDate->addDay();
        }

        // Gabungkan data booking dengan daftar tanggal lengkap
        $pengunjungCounts = $allDates->merge($pengunjungData)->values();
        $pengunjungLabels = $allDates->keys()->map(function ($date) {
        return Carbon::parse($date)->locale('id')->isoFormat('DD MMM');
        });

        // Kirim data ke blade
        return view('dashboardAdminKendaraan', compact('kendaraan', 'totalKendaraan', 'totalCustomer', 'totalBooking', 'verifikasi', 'labels', 'data', 'pengunjungLabels', 'pengunjungCounts'
        ));
    }
}