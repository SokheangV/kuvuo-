<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Support\ProductCategoryResolver;
use Throwable;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('partials.header', function ($view) {
            try {
                $shopMenuCategories = Schema::hasTable('categories')
                    ? ProductCategoryResolver::menuCategories()
                    : collect();
            } catch (Throwable) {
                $shopMenuCategories = collect();
            }

            $view->with('shopMenuCategories', $shopMenuCategories);
        });
    }
}
