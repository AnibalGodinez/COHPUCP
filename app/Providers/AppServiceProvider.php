<?php

namespace App\Providers;
;
use Illuminate\Support\ServiceProvider;
use App\Models\FooterContent;

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
        view()->composer('layouts.footer', function ($view) {
            $view->with('footerContents', FooterContent::all());
        });
    }
}
