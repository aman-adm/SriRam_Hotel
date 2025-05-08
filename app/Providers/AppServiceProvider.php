<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Logo;
use App\Models\ColorModel;
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
        $logo = Logo::where('status', 'active')->where('action', 'show')->first();

        View::share('globalLogo', $logo);
        
        View::composer('*', function ($view) {
            $theme = ColorModel::first();
            $view->with('theme', $theme);
        });
       
    }
}
