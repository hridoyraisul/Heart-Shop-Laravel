<?php

namespace App\Providers;
use App\Category;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Cart;
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
//        View::share('allCategory', 'Category::where(\'publication_status\',1)->get()');
        View::composer('*', function ($view){
            $view->with('allCategory',Category::where('publication_status',1)->get());
            $view->with('cartContent',Cart::getContent());
            $view->with('totalQuantity',Cart::getTotalQuantity());
            $view->with('subTotal',Cart::getSubTotal());
        });
    }
}
