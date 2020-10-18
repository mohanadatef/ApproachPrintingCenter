<?php

namespace App\Providers;

use App\Models\ContactUs;
use App\Models\Gender;
use App\Models\Machine;
use App\Models\Setting;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer(['includes.admin.main-sidebar','includes.admin.header-contect'], function ($view) {
            $machine=Machine::where('kind',2)->get();
            $view->with('machine',$machine);
        });
    }
}
