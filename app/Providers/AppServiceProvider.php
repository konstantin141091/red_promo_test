<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

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
        Blade::directive('userFavorites', function ($expression) {
//            dd($expression);
            $check_news = DB::table('user_favorites_news')->where('user_id', Auth::id())
                ->where('news_id', $expression)->get();
            if ($check_news->isNotEmpty()) {
                return true;
            } else return false;
        });

        Blade::if('userFavorites', function ($id) {
            $check_news = DB::table('user_favorites_news')->where('user_id', Auth::id())
                ->where('news_id', $id)->get();
            if ($check_news->isEmpty()) {
                return true;
            } else return false;
        });
    }
}
