<?php

namespace App\Providers;
use App\Models\GoldPrices;
use App\Observers\GoldPricesObserver;
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
        GoldPrices::observe(GoldPricesObserver::class);
    }
}
