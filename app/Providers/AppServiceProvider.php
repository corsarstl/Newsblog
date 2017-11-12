<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Models\Banner;
use App\Models\Category;
use App\Models\Tag;


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

        view()->composer('admin.dashboard', function($view) {
            $view->with('categoriesForMenu', Category::categoriesForMenu());
        });

        view()->composer('admin.dashboard', function($view) {
            $view->with('tagsForDashboard', Tag::tagsForDashboard());
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
