<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\FooterContent;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    public function boot()
    {
        Schema::defaultStringLength(191);
        view()->composer('layouts.footer', function ($view) {
            $view->with('footerContents', FooterContent::all());
        });
    }
}
