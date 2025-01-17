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

    }
}
