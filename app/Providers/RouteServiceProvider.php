<?php

namespace App\Providers;

use Illuminate\Http\Request;
use Illuminate\Support\ServiceProvider;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\RateLimiter;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */

    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        // $this->configureRateLimiting();

        // // $this->routes(function () {
        //     Route::prefix('admin')
        //         ->middleware(['api', 'setLocale'])
        //         ->group(base_path('routes/admin.php'));

        //     Route::prefix('api')
        //         ->middleware(['api', 'setLocale'])
        //         ->group(base_path('routes/api.php'));
        // // });
    }

    /**
     * Configure the rate limiters for the application.
     */
    protected function configureRateLimiting(): void
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });
    }
}
