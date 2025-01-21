<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\kendaraan;

class daftarKendaraanController extends Controller
{
    public function index(Request $request)
    {

        // Mengambil data kendaraan
        $kendaraan = kendaraan::get()->toArray();

        foreach ($kendaraan as &$data) { // Gunakan reference "&" agar array berubah
            if (!empty($data['foto'])) {
                $data['foto_base64'] = 'data:image/jpeg;base64,' . base64_encode($data['foto']);
            } else {
                $data['foto_base64'] = asset('default-image.jpg');
            }
        }
        
        // Mengirim data ke view
        return view('daftarKendaraan', compact('kendaraan'));
    }

    public function destroy($platNomor)
    {
        // Cari kendaraan berdasarkan platNomor
        $kendaraan = kendaraan::where('platNomor', $platNomor)->first();

        // Periksa apakah kendaraan ditemukan
        if (!$kendaraan) {
            return redirect()->back()->with('error', 'Kendaraan tidak ditemukan.');
        }

        // Hapus kendaraan
        $kendaraan->delete();

        // Redirect kembali dengan pesan sukses
        return redirect()->route('daftarKendaraan')->with('success', 'Kendaraan berhasil dihapus.');
    }

}
