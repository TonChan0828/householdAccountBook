<?php

namespace App\Providers;

use App\Models\Time;
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
            $book_model = new Time();
            $years = \DB::table('times')
                ->select('year')
                ->where('user_id', '=', \Auth::id())
                ->whereNull('deleted_at')
                ->distinct()
                ->orderBy('year', 'ASC')
                ->get();

            $view->with('years', $years);
        });
    }
}
