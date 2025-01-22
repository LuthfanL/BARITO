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
use App\Models\User;

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

        $users = User::where('email', $validate['email'])->first();

        if (!$users){
            return redirect()->back()->withErrors('Email tidak terdaftar!')->withInput();
        }

        if (!Hash::check($validate['password'], $users->password)){
            return redirect()->back()->withErrors('Password salah!')->withInput();
        }

        $info = $request->only('email', 'password');

        if (Auth::attempt($info)){
            $user = Auth::user();
            $role = $user->role;

            return $this->redirectTo($role);
        }
    }

    public function redirectTo($role){
        switch ($role) {
            case 'Customer' :
                return redirect()->intended('/')->with('success', 'Berhasil login!');
            case 'Admin Ruangan' :
                return redirect()->intended('/dashboardAdminRuangan')->with('success', 'Berhasil login!');
            case 'Admin Kendaraan' :
                return redirect()->intended('/dashboardAdminKendaraan')->with('success', 'Berhasil login!');
            case 'Admin Tenant' :
                return redirect()->intended('/dashboardAdminTenant')->with('success', 'Berhasil login!');
            default :
                return redirect()->back()->withErrors('Role tidak ditemukan!');
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
            if (hash::check($validate['password'], $emailCus->password)){
                return redirect()->route('login')->withErrors('Password sebelum dan sesudah update sama!')->withInput();
            }
            DB::table('customer')->where('email', $validate['email'])->update([
                'password' => hash::make($validate['password']),
            ]);
            DB::table('users')->where('email', $validate['email'])->update([
                'password' => hash::make($validate['password']),
            ]);
            return redirect()->route('login')->with('success', 'Password berhasil diupdate!');
        }

        if ($emailAR){
            if (hash::check($validate['password'], $emailAR->password)){
                return redirect()->route('login')->withErrors('Password sebelum dan sesudah update sama!')->withInput();
            }
            DB::table('adminRuangan')->where('email', $validate['email'])->update([
                'password' => hash::make($validate['password']),
            ]);
            DB::table('users')->where('email', $validate['email'])->update([
                'password' => hash::make($validate['password']),
            ]);
            return redirect()->route('login')->with('success', 'Password berhasil diupdate!');
        }

        if ($emailAK){
            if (hash::check($validate['password'], $emailAK->password)){
                return redirect()->route('login')->withErrors('Password sebelum dan sesudah update sama!')->withInput();
            }
            DB::table('adminKendaraan')->where('email', $validate['email'])->update([
                'password' => hash::make($validate['password']),
            ]);
            DB::table('users')->where('email', $validate['email'])->update([
                'password' => hash::make($validate['password']),
            ]);
            return redirect()->route('login')->with('success', 'Password berhasil diupdate!');
        }

        if ($emailAT){
            if (hash::check($emailAT->password, $emailAT->password)){
                return redirect()->route('login')->withErrors('Password sebelum dan sesudah update sama!')->withInput();
            }
            DB::table('adminTenant')->where('email', $validate['email'])->update([
                'password' =>hash::make($validate['password']),
            ]);
            DB::table('users')->where('email', $validate['email'])->update([
                'password' => hash::make($validate['password']),
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
