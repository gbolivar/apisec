<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Support\Facades\RateLimiter;

class RouteServiceProvider extends ServiceProvider
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
        RateLimiter::for('custom_limit', function ($request) {
            \Log::info('RateLimiter ejecutado para: ' . $request->ip()); // 👀 Verificación
            return Limit::perMinute(5)->by($request->ip()); // 🔹 Límite de 5 peticiones por minuto
        });
    }
}
