<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\customer;

class profilController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $cus = customer::where('email', $user->email)->first();

        return view('profile', compact('cus'));
    }

    public function edit(){
        $user = Auth::user();
        $cus = customer::where('email', $user->email)->first();

        return view('editProfile', compact('cus'));
    }

    public function save(Request $request){
        $validate = $request->validate([
            'name' => 'required|string|max:30',
            'alamat' => 'required|string|max:50',
            'noHP' => 'required|string|max:13|regex:/^08[0-9]{8,11}$/',
        ],
        [
            'name.required' => 'Nama tidak boleh kosong!',
            'alamat.required' => 'Alamat tidak boleh kosong!',
            'noHP.regex' => 'Format nomor Whatsapp harus dimulai dengan 08!',
        ]);

        $user = Auth::user();
        $cus = customer::where('email', $user->email)->first();

        if ($validate['name'] == $cus->name && $validate['alamat'] == $cus->alamat && $validate['noHP'] == $cus->noHP){
            return redirect()->back()->withErrors('Nama, alamat, dan nomor HP Sama dengan sebelum diubah!')->withInput();
        }

        DB::table('customer')->where('NIK', $cus->NIK)->update([
            'name' => $validate['name'],
            'alamat' => $validate['alamat']
        ]);

        return redirect()->intended('/profile')->with('success', 'Profil berhasil diperbaharui!');
    }

    public function hapus(){
        $user = Auth::user();
        $cus = customer::where('email', $user->email)->first();

        DB::table('users')->where('email', $user->email)->delete();
        DB::table('customer')->where('NIK', $cus->NIK)->delete();

        return redirect()->route('logout')->with('success', 'Akun berhasil dihapus!');
    }
}
