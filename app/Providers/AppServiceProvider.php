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

        view()->composer('layouts.out', function ($view) {
            $view->with('keywords', \App\Category::metaKeywords());
        });

        view()->composer('shared.store-nav', function ($view) {
            $view->with('stores', \App\Store::offersFromStores());
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
