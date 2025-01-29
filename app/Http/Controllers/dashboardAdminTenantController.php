<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\event;
use App\Models\customer;
use App\Models\adminTenant;
use App\Models\pemTenant;
use Illuminate\Support\Facades\Storage;

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

        $event = event::all();
        $totalCustomer = customer::count();
        $totalEvent = $event->count(); // Hitung total event

        // Hitung jumlah booking dengan status "Belum disetujui" atau "Disetujui"
        $totalBooking = pemTenant::where('idAdmin', $idAdmin)
            ->whereIn('status', ['Belum disetujui', 'Disetujui'])
            ->count();

        // Hitung jumlah booking dengan status "Belum disetujui"
        $verifikasi = pemTenant::where('idAdmin', $idAdmin)
            ->where('status', 'Belum disetujui')
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
        
        // Kirim data event dan total event ke blade
        return view('dashboardAdminTenant', compact('event', 'totalEvent', 'totalCustomer', 'totalBooking', 'verifikasi'));
    }
}
