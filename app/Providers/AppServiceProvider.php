<?php

namespace App\Providers;

use App\Repositories\Eloquent\PaymentRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
//        $this->app->bind('App\Factorys\Payment', 'App\Repositories\Eloquent\PaymentRepository');
        $this->app->singleton('Payment', function ($app) {
            return new PaymentRepository($app);
        });
    }
}
