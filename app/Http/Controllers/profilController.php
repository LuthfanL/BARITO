<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class profilController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        return view('profile', compact('user'));
    }

    public function edit(){
        return view('editProfile');
    }

    public function save(Request $request){
        $validate = $request->validate([
            'name' => 'required|string|max:30',
            'alamat' => 'required|string|max:50',
        ],
        [
            'name.required' => 'Nama tidak boleh kosong!',
            'alamat.required' => 'Alamat tidak boleh kosong!',
        ]);

        $user = Auth::user();

        if ($validate['name'] == $user->name){
            return redirect()->back()->withErrors('Nama Sama dengan sebelum diubah!')->withInput();
        }

        if ($validate['alamat'] == $user->alamat){
            return redirect()->back()->withErrors('Alamat sama dengan sebelum diubah!')->withInput();
        }

        DB::table('customer')->where('NIK', $user->NIK)->update([
            'name' => $validate['name'],
            'alamat' => $validate['alamat']
        ]);

        return redirect()->intended('/profile')->with('success', 'Profil berhasil diperbaharui!');
    }

    public function hapus(){
        $user = Auth::user();

        DB::table('customer')->where('NIK', $user->NIK)->delete();

        return redirect()->route('logout')->with('success', 'Akun berhasil dihapus!');
    }
}
