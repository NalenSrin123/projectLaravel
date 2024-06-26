<?php

namespace App\Providers;

use App\Models\Logo;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register() :void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot() :void
    {
        view()->composer('frontend.layout',function($view){
            $logo=Logo::query()
                    ->orderBy('id','DESC')
                    ->limit(1)
                    ->get();

             $view->with('logo',$logo);
        });
        Paginator::useBootstrapFive();
    }
}

