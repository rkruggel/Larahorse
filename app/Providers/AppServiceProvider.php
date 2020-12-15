<?php
/*
 * Projekt  Larahorse
 * ----------------------------------------------------
 *
 * Copyright (c) 2020-2020,  Roland Kruggel
 * All Rights Reserved.
 * License: MIT
 *
 * @author		Roland Kruggel, rkruggel@bbf7.de
 * @file		AppServiceProvider.php
 * @path		/home/roland/Develop/Larahorse/app/Providers/AppServiceProvider.php
 * @lastChange	20.11.20, 10:19 by roland
 */

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Config;
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
//        Blade::component('layouts.components.test-component', 'tc');
//        $value = session('progname');
//        $value = config('rk_progname');
//
//        view()->composer('layouts.master', function ($view) use ($value) {
//            $view->with('value', $value);
//        });

//        $t = Config::get('lara.progname');
//        view()->share('value', $t);

    }
}
