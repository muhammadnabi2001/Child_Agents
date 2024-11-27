<?php

namespace App\Providers;

use App\Models\Talaba;
use App\Observers\TalabaObserver;
use Illuminate\Pagination\Paginator;
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
        Talaba::observe(TalabaObserver::class);
        Paginator::useBootstrapFive();
        Paginator::useBootstrapFour();
    }
}
