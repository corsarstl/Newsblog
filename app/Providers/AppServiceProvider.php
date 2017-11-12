<?php

namespace App\Providers;

use App\Models\Category;
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

        view()->composer('layouts.nav', function($view) {
            $view->with('categoriesForMenu', Category::categoriesForMenu());
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
