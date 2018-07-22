<?php

namespace App\Providers;

use View;
use Session;
use Cart;
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
        View::composer('layouts.front', function($view) {
            $cart_qty =  Cart::count();
            $view->with('cart_qty',$cart_qty);
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
