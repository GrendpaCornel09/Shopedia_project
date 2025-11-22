<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Categories;
use App\Models\Products;
use App\Models\CountriesOfOrigin;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        View::composer('dashboard',function($view){
            $view->with([
                'categories'=>Categories::all(),
                'countries'=>CountriesOfOrigin::all(),
            ]);
        });
    }
}
