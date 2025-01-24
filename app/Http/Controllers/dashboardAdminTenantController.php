<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\adminTenant;
use App\Models\event;
use App\Models\customer;
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
        $event = event::all();
        $totalCustomer = customer::count();
        $totalEvent = $event->count(); // Hitung total event
        
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
        return view('dashboardAdminTenant', compact('event', 'totalEvent', 'totalCustomer'));
    }
}
