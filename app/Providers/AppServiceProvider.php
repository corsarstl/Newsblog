<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Banner;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('banners.banner', function($view) {
            $view->with('banners', Banner::banners());
        });


    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
