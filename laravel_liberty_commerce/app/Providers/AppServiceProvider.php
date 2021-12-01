<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Session;

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
        View::composer('layout.header', function() {
            if (auth()->check()) {
                $item_count = \DB::table('users_has_products')->where('user_id', auth()->user()->id)->count();
            } else {
                $item_count = 0;
            }
            Session::put('item_count', $item_count);
        });

        View::composer('cart', function() {
            $items = \DB::table('users_has_products')->where('user_id', auth()->user()->id)->get('product_id');
            $total = 0;
            foreach ($items as $item){
                $total += \DB::table('products')->where('id', $item->product_id)->first('price')->price;
            }
            Session::put('total', $total);
        });
    }
}
