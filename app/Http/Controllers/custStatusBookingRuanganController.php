<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\customer;
use App\Models\pemRuangan;

class custStatusBookingRuanganController extends Controller
{
    public function index(Request $request)
    {
        // Ambil pengguna yang sedang login
        $user = auth()->user();

        // Ambil nik dari model customer
        $nik = customer::getNikByEmail($user->email);
        
        if (!$nik) {
            // Tangani error jika nik tidak ditemukan
            return back()->with('error', 'Customer tidak ditemukan');
        }

        // Ambil data pemRuangan berdasarkan idAdmin
        $bookings = pemRuangan::where('idCustomer', $nik)->get();

        // Kirimkan data ke view
        return view('custStatusBookingRuangan', [
            'bookings' => $bookings,
        ]);
    }
}
