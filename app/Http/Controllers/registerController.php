<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\customer;

class registerController extends Controller
{
    public function index()
    {
        return view('register');
    }

    public function store(Request $request){
        $validate = $request->validate([
            'nik' => 'required|string|size:16',
            'name' => 'required|string|max:30',
            'alamat' => 'required|string|max:50',
            'email' => 'required|email|max:50',
            'password' => 'required|string|between:8,10|regex:/[a-z]/|regex:/[A-Z]/|regex:/[0-9]/|regex:/[@$!%*?&]/',
            'konfirmasiPassword' => 'required|string|between:8,10',
        ], [
            'nik.required' => 'NIK tidak boleh kosong!',
            'name.required' => 'Nama tidak boleh kosong!',
            'alamat.required' => 'Alamat tidak boleh kosong!',
            'email.required' => 'Email tidak boleh kosong!',
            'password.required' => 'Password tidak boleh kosong!',
            'password.regex' => 'Password harus mengandung huruf besar, huruf kecil, angka, dan simbol',
            'konfirmasiPassword.required' => 'Konfirmasi password tidak boleh kosong!',
        ]);

        $nikUsed = customer::where('nik', $validate['nik'])->first();
        if ($nikUsed) {
            return redirect()->back()->withErrors('NIK sudah terdaftar!')->withInput();
        }

        $emailUsed = customer::where('email', $validate['email'])->first();
        if ($emailUsed) {
            return redirect()->back()->withErrors('Email sudah terdaftar!')->withInput();
        }

        if ($validate['password'] != $validate['konfirmasiPassword']){
            return redirect()->back()->withErrors('Konfirmasi password berbeda dengan password!')->withInput();
        }

        DB::table('customer')->insert([
            'nik' => $validate['nik'],
            'name' => $validate['name'],
            'alamat' => $validate['alamat'],
            'email' => $validate['email'],
            'password' => hash::make($validate['password']),
            'konfirmasiPassword' => hash::make($validate['konfirmasiPassword'])
        ]);

        return redirect()->route('login')->with('success', 'Berhasil Mendaftar! Silahkan login.');
    }
}
