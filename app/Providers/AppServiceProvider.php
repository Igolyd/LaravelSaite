<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Laravel\Fortify\Http\Controllers\EmailVerificationNotificationController;
use Illuminate\Support\Facades\Gate;



class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->afterResolving(EmailVerificationNotificationController::class, function ($controller) {
            // use the name you set for your rate limiter below
            $controller->middleware('throttle:verification');
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
    // choose the name you want for your rate limiter
    RateLimiter::for('verification', function (Request $request) {
    return Limit::perMinute(3)->by($request->ip());
                            
    });
    }
    
}
