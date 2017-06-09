<?php

namespace App\Providers;

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
        view()->composer('shared.blog-sidebar', function ($view) {
            $view->with('side_blogs', \App\Blog::sideBar());
        });

        view()->composer('layouts.app', function ($view) {
            $view->with('keywords', \App\Category::metaKeywords());
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
