<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL; // <--- TAMBAHKAN BARIS INI

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // TAMBAHKAN KODE DI BAWAH INI
        if (config('app.env') === 'production') {
            URL::forceScheme('https');
        }
    }
}
