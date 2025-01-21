<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\customer;
use App\Models\adminRuangan;
use App\Models\adminKendaraan;
use App\Models\adminTenant;

class loginController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function login(Request $request){
        $validate = $request->validate([
            'email' => 'required|email|max:50',
            'password' => 'required|string|between:8,10|regex:/[a-z]/|regex:/[A-Z]/|regex:/[0-9]/|regex:/[@$!%*?&]/',
        ], [
            'email.required' => 'Email tidak boleh kosong!',
            'password.required' => 'Password tidak boleh kosong!',
            'password.regex' => 'Password harus mengandung huruf besar, huruf kecil, angka, dan simbol',
        ]);

        $emailCus = customer::where('email', $validate['email'])->first();
        $emailAR = adminRuangan::where('email', $validate['email'])->first();
        $emailAK = adminKendaraan::where('email', $validate['email'])->first();
        $emailAT = adminTenant::where('email', $validate['email'])->first();
        if (!$emailCus && !$emailAR && !$emailAK && !$emailAT){
            return redirect()->back()->withErrors('Email belum terdaftar!')->withInput();
        }

        if ($emailCus){
            $pwCus = $emailCus->password;
            if (!hash::check($validate['password'], $pwCus)) {
                return redirect()->back()->withErrors('Password Salah!')->withInput();
            }

            Auth::login($emailCus);
            return redirect()->intended('/')->with('success', 'Berhasil Login!');
        }

        if ($emailAR){
            $pwAR = $emailAR->password;
            if (!hash::check($validate['password'], $pwAR)) {
                return redirect()->back()->withErrors('Password Salah!')->withInput();
            }
    
            Auth::login($emailAR);
            return redirect()->intended('/dashboardAdminRuangan')->with('success', 'Berhasil Login!');
        }

        if ($emailAK){
            $pwAK = $emailAK->password;
            if (!hash::check($validate['password'], $pwAK)) {
                return redirect()->back()->withErrors('Password Salah!')->withInput();
            }
     
            Auth::login($emailAK);
            return redirect()->intended('/dashboardAdminKendaraan')->with('success', 'Berhasil Login!');
        }

        if ($emailAT){
            $pwAT = $emailAT->password;
            if (!hash::check($validate['password'], $pwAT)) {
                return redirect()->back()->withErrors('Password Salah!')->withInput();
            }
           
            Auth::login($emailAT);
            return redirect()->intended('/dashboardAdminTenant')->with('success', 'Berhasil Login!');
        }
    }

    public function lupaPW(){
        return view('lupaPW');
    }

    public function updatePW(Request $request){
        $validate = $request->validate([
            'email' => 'required|email|max:50',
            'password' => 'required|string|between:8,10|regex:/[a-z]/|regex:/[A-Z]/|regex:/[0-9]/|regex:/[@$!%*?&]/',
            'konfirmasiPassword' => 'required|string|between:8,10',
        ], [
            'email.required' => 'Email tidak boleh kosong!',
            'password.required' => 'Password tidak boleh kosong!',
            'password.regex' => 'Password harus mengandung huruf besar, huruf kecil, angka, dan simbol',
            'konfirmasiPassword.required' => 'Konfirmasi password tidak boleh kosong!',
        ]);

        $emailCus = customer::where('email', $validate['email'])->first();
        $emailAR = adminRuangan::where('email', $validate['email'])->first();
        $emailAK = adminKendaraan::where('email', $validate['email'])->first();
        $emailAT = adminTenant::where('email', $validate['email'])->first();
        if (!$emailCus && !$emailAR && !$emailAK && !$emailAT){
            return redirect()->back()->withErrors('Email Tidak terdaftar!')->withInput();
        }

        if ($validate['password'] != $validate['konfirmasiPassword']){
            return redirect()->back()->withErrors('Konfirmasi password berbeda dengan password!')->withInput();
        }
        
        if ($emailCus){
            if (hash::check($emailCus->password, $validate['password'])){
                return redirect()->route('login')->withErrors('Password sebelum dan sesudah update sama!')->withInput();
            }
            DB::table('customer')->where('email', $validate['email'])->update([
                'password' => hash::make($validate['password']),
            ]);
            return redirect()->route('login')->with('success', 'Password berhasil diupdate!');
        }

        if ($emailAR){
            if (hash::check($emailAR->password, $validate['password'])){
                return redirect()->route('login')->withErrors('Password sebelum dan sesudah update sama!')->withInput();
            }
            DB::table('adminRuangan')->where('email', $validate['email'])->update([
                'password' => hash::make($validate['password']),
            ]);
            return redirect()->route('login')->with('success', 'Password berhasil diupdate!');
        }

        if ($emailAK){
            if (hash::check($emailAK->password, $validate['password'])){
                return redirect()->route('login')->withErrors('Password sebelum dan sesudah update sama!')->withInput();
            }
            DB::table('adminKendaraan')->where('email', $validate['email'])->update([
                'password' => hash::make($validate['password']),
            ]);
            return redirect()->route('login')->with('success', 'Password berhasil diupdate!');
        }

        if ($emailAT){
            if (hash::check($validate['password'], $emailAT->password)){
                return redirect()->route('login')->withErrors('Password sebelum dan sesudah update sama!')->withInput();
            }
            DB::table('adminTenant')->where('email', $validate['email'])->update([
                'password' =>hash::make($validate['password']),
            ]);
            return redirect()->route('login')->with('success', 'Password berhasil diupdate!');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
