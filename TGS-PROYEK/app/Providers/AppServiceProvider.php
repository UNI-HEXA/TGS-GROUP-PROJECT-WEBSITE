<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator; // Tambahkan ini
use Illuminate\Support\Facades\Schema; // Tambahkan ini

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
        // Mengatur agar Pagination menggunakan class Tailwind CSS (Sesuai desain TGS Anda)
        Paginator::useTailwind();

        // Mencegah error "key too long" pada database versi lama (Opsional tapi disarankan)
        Schema::defaultStringLength(191);
    }
}
