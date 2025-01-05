<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Laravel\Fortify\Contracts\RegisterViewResponse;
use Laravel\Fortify\Http\Responses\SimpleViewResponse;

class AppServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(RegisterViewResponse::class, function () {
            return new SimpleViewResponse('auth.register');
        });
    }

    public function boot()
    {
        //
    }
}
