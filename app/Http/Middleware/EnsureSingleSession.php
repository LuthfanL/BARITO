<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EnsureSingleSession
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Periksa apakah pengguna sedang login
        if (Auth::check()) {
            // Ambil user ID dari sesi
            $currentSessionUserId = session('user_id');

            // Jika sesi tidak cocok dengan ID pengguna yang sedang login, logout dan redirect
            if ($currentSessionUserId && $currentSessionUserId !== Auth::id()) {
                Auth::logout(); // Logout pengguna
                session()->flush(); // Hapus sesi
                return redirect()->route('login')->withErrors('Anda telah login dengan akun lain, silakan login ulang.');
            }

            // Simpan user ID ke sesi jika belum ada
            session(['user_id' => Auth::id()]);
        }

        return $next($request);
    }
}