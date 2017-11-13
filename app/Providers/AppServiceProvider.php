<?php

namespace App\Providers;

use Schema;

use Illuminate\Support\ServiceProvider;

use App\Models\Banner;
use App\Models\Category;
use App\Models\Comment;
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
	Schema::defaultStringLength(191);

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

        view()->composer('admin.dashboard', function($view) {
            $view->with('bannersForDashboard', Banner::bannersForDashboard());
        });

        view()->composer('admin.dashboard', function($view) {
            $view->with('commentsInPolitics', Comment::commentsInPolitics());
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
