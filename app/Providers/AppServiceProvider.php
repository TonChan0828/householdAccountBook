<?php

namespace App\Providers;

use App\Models\Book;
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
        view()->composer("*", function ($view) {
            $book_model = new Book();
            // $years =
        });
    }
}
