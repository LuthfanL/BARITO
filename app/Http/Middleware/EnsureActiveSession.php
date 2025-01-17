<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Http\Middleware\EnsureActiveSession as Middleware;

class EnsureActiveSession extends Middleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // Cek apakah pengguna login
        if (Auth::check()) {
            $activeUserId = Session::get('active_user');
            
            // Jika session tidak cocok dengan akun yang sedang login
            if ($activeUserId !== Auth::id()) {
                // Logout pengguna
                Auth::logout();

                // Redirect ke halaman login dengan pesan
                return redirect()->route('login')->withErrors('Sesi Anda telah berakhir. Silakan login kembali.');
            }
        }

        return $next($request);
    }
}