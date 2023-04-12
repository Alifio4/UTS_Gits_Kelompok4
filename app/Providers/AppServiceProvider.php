<?php

namespace App\Providers;

use DB;
use App\Models\Cart;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

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

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // $cart=Cart::where('status','ditambahkan')->get()->count();
        // View::share('cart',$cart);
    }
}
