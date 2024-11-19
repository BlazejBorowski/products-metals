<?php

namespace App\Providers;

use App\interfaces\MetalPriceServiceInterface;
use App\Services\FakeMetalPriceService;
use App\Services\RealMetalPriceService;
use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
