<?php

namespace App\Providers;

use App\Billings\PaymentServices\BkashService;
use Illuminate\Support\ServiceProvider;

class BkashServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(BkashService::class, function ($app) {
            return new BkashService();
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
