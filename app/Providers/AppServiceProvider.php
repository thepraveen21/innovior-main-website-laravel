<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Header;
use App\Models\Footer;

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
        try {
            View::share('header', Header::first() ?? new Header());
            View::share('footer', Footer::first() ?? new Footer());
        } catch (\Exception $e) {
            // Tables might not exist during migration
            View::share('header', new Header());
            View::share('footer', new Footer());
        }
    }
}
