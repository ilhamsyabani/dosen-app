<?php

namespace App\Providers;

use Illuminate\Auth\Middleware\RedirectIfAuthenticated;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;

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
        // Redirect dosen yang sudah login ke dashboard, bukan ke admin/home
        RedirectIfAuthenticated::redirectUsing(function ($request) {
            if (Auth::guard('dosen')->check()) {
                return '/dashboard';
            }

            return route('home');
        });
    }
}
