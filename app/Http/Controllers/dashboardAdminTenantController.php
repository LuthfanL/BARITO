<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\event;
use App\Models\customer;
use App\Models\adminTenant;
use App\Models\pemTenant;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon; 
use Illuminate\Support\Facades\DB;

class dashboardAdminTenantController extends Controller
{
    public function index(Request $request)
    // {
    //     $user = Auth::user();
    //     $AT = adminTenant::where('email', $user->email)->first();

    //     return view('dashboardAdminTenant', compact('AT'));
    // }

    {
        // Ambil pengguna yang sedang login
        $user = auth()->user();

        // Ambil idAdmin dari model adminTenant berdasarkan email
        $idAdmin = adminTenant::getIdAdminByEmail($user->email);

        if (!$idAdmin) {
            // Tangani error jika idAdmin tidak ditemukan
            return back()->with('error', 'Admin tidak ditemukan');
        }

        $now = Carbon::now()->startOfDay();
        $event = event::where('tglMulai', '>', $now);
        $totalCustomer = pemTenant::where('status', 'Disetujui')->distinct('idCustomer')->count('idCustomer');
        $totalEvent = $event->count(); // Hitung total event

        // Hitung jumlah booking dengan status "Menunggu persetujuan" atau "Disetujui"
        $totalBooking = pemTenant::where('idAdmin', $idAdmin)
            ->whereIn('status', ['Menunggu persetujuan', 'Disetujui'])
            ->count();

        // Hitung jumlah booking dengan status "Menunggu persetujuan"
        $verifikasi = pemTenant::where('idAdmin', $idAdmin)
            ->where('status', 'Menunggu persetujuan')
            ->count();
        
        foreach ($event as &$data) {
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
        $peminjamanData = pemTenant::where('idAdmin', $idAdmin)
            ->whereIn('status', ['Menunggu persetujuan', 'Disetujui'])
            ->whereBetween('created_at', [$startDate, $endDate])
            ->selectRaw('namaEvent, COUNT(*) as total')
            ->groupBy('namaEvent')
            ->get();

        $labels = $peminjamanData->pluck('namaEvent');
        $data = $peminjamanData->pluck('total');

        // Jika request AJAX, kirim data dalam format JSON
        if ($request->ajax()) {
            return response()->json([
                'labels' => $labels,
                'data' => $data
            ]);
        }

        // Statistik Booking Customer
        $pengunjungData = pemTenant::where('idAdmin', $idAdmin)
            ->whereIn('status', ['Menunggu persetujuan', 'Disetujui'])
            ->whereBetween('created_at', [$startDate, $endDate])
            ->selectRaw('DATE(created_at) as date, COUNT(*) as total')
            ->groupBy('date')
            ->get();
        
        $pengunjungLabels = $pengunjungData->pluck('date')->map(function ($date) {
            return Carbon::parse($date)->locale('id')->isoFormat('DD MMM'); // Format tanggal dalam format Indonesia
        });
        $pengunjungCounts = $pengunjungData->pluck('total');
        
        // Kirim data event dan total event ke blade
        return view('dashboardAdminTenant', compact('event', 'totalEvent', 'totalCustomer', 'totalBooking', 'verifikasi', 'labels', 'data', 'pengunjungLabels', 'pengunjungCounts'));
    }
}
