<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Providers\ViewServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // Registrasi ViewServiceProvider agar dijalankan oleh Laravel
        $this->app->register(ViewServiceProvider::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}