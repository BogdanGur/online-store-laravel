<?php

namespace App\Providers;

use App\Models\Cart;
use App\Models\Site;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider {
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register() {

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot() {

        $mainData = [
            "site" => Site::find(1),
            "total_cart" => count(Cart::where("user_id", Auth::id())->get())
        ];
        View::share($mainData);

        Paginator::useBootstrap();
    }
}
