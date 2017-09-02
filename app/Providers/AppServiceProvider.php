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

        view()->composer('layouts.out', function ($view) {
            $view->with('autoFillKeywords', \App\Category::autoFillKeywords());
        });

        view()->composer('shared.type-nav', function ($view) {
           $view->with('type_list', \App\Type::typesForMenu());
        });

        view()->composer('shared.store-side', function ($view) {
            $view->with('stores', \App\Store::sideStore());
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
