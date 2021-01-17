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

use App\Library\YamlData;
use Exception;
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
//    public $yamlsys;

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
//        view()->composer('app', function($view) {
//            $yamlsystem = YamlData::Read('system');
//            $view->with('topmenu', $yamlsystem['page']['topmenu']);
//            $a=0;
//        });

        try {
            $yamldata = new YamlData('main');
            $fag = $yamldata->dataToArray();
            $vie = $fag['topmenu'];
        } catch (Exception $e) {
            $vie = '--';
        }

//        view()->composer('app', function($view) {
//            $yamlsystem = YamlData::Read('system');
//            $this->yamlsys = $yamlsystem;
//            $view->with('topmenu', $this->yamlsys['page']['topmenu']);
//        });

        view()->share([
            'topmenu' => $vie,
            'testnr' => 1000
        ]);
        $a = 0;
    }
}
