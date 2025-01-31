<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ruangan;
use App\Models\customer;
use App\Models\adminRuangan;
use App\Models\pemRuangan;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon; 

class dashboardAdminRuanganController extends Controller
{
    public function index(Request $request)
    {
        // Ambil pengguna yang sedang login
        $user = auth()->user();

        // Ambil idAdmin dari model adminRuangan berdasarkan email
        $idAdmin = adminRuangan::getIdAdminByEmail($user->email);

        if (!$idAdmin) {
            // Tangani error jika idAdmin tidak ditemukan
            return back()->with('error', 'Admin tidak ditemukan');
        }

        $ruangan = ruangan::all();
        $totalCustomer = pemRuangan::where('status', 'Disetujui')->distinct('idCustomer')->count('idCustomer');
        $totalRuangan = $ruangan->count(); // Hitung total ruangan

        // Hitung jumlah booking dengan status "Menunggu persetujuan" atau "Disetujui"
        $totalBooking = pemRuangan::where('idAdmin', $idAdmin)
            ->whereIn('status', ['Menunggu persetujuan', 'Disetujui'])
            ->count();

        // Hitung jumlah booking dengan status "Menunggu persetujuan"
        $verifikasi = pemRuangan::where('idAdmin', $idAdmin)
        ->where('status', 'Menunggu persetujuan')
        ->count();

        foreach ($ruangan as &$data) {
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

        // Statistik Peminjaman Lingkaran berdasarkan status
        $peminjamanData = PemRuangan::where('idAdmin', $idAdmin)
            ->whereIn('status', ['Menunggu persetujuan', 'Disetujui'])
            ->whereBetween('created_at', [$startDate, $endDate])
            ->selectRaw('namaRuangan, COUNT(*) as total')
            ->groupBy('namaRuangan')
            ->get();

        $labels = $peminjamanData->pluck('namaRuangan');
        $data = $peminjamanData->pluck('total');

        // Jika request AJAX, kirim data dalam format JSON
        if ($request->ajax()) {
            return response()->json([
                'labels' => $labels,
                'data' => $data
            ]);
        }

        // Statistik Booking Customer
        $pengunjungData = pemRuangan::where('idAdmin', $idAdmin)
            ->whereIn('status', ['Menunggu persetujuan', 'Disetujui'])
            ->whereBetween('created_at', [$startDate, $endDate])
            ->selectRaw('DATE(created_at) as date, COUNT(*) as total')
            ->groupBy('date')
            ->get();
        
        $pengunjungLabels = $pengunjungData->pluck('date')->map(function ($date) {
            return Carbon::parse($date)->locale('id')->isoFormat('DD MMM'); // Format tanggal dalam format Indonesia
        });
        $pengunjungCounts = $pengunjungData->pluck('total');
        
        // Kirim data ruangan dan total ruangan ke blade
        return view('dashboardAdminRuangan', compact('ruangan', 'totalRuangan', 'totalCustomer', 'totalBooking', 'verifikasi', 'labels', 'data', 'pengunjungLabels', 'pengunjungCounts'));
    }
}
