<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

// Added
use Illuminate\Support\Facades\Http;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Macro for interacting with trackmania.io API
        Http::macro('tmio', function () {
            return Http::withHeaders([
                'User-Agent' => config('webgbx.useragent'),
            ])->baseUrl('https://trackmania.io/api');
        });
    }
}
