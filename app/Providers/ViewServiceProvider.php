<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider; // <- Tambahkan ini
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use App\Models\customer;
use App\Models\adminRuangan;
use App\Models\adminKendaraan;
use App\Models\adminTenant;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot()
    {
        View::composer('*', function ($view) {
            $user = Auth::user();
            $customerName = null;

            if ($user) {
                switch ($user->role) {
                    case 'Customer':
                        $data = customer::where('email', $user->email)->first();
                        break;
                    case 'Admin Ruangan':
                        $data = adminRuangan::where('email', $user->email)->first();
                        break;
                    case 'Admin Kendaraan':
                        $data = adminKendaraan::where('email', $user->email)->first();
                        break;
                    case 'Admin Tenant':
                        $data = adminTenant::where('email', $user->email)->first();
                        break;
                    default:
                        $data = null;
                }

                $customerName = $data ? $data->name : null;
            }

            $view->with('customerName', $customerName);
        });
    }
}
