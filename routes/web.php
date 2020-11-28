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
 * @file		web.php
 * @path		/home/roland/Develop/Larahorse/routes/web.php
 * @lastChange	20.11.20, 10:22 by roland
 */

use App\Http\Controllers\SdPferdeController;
use App\Http\Controllers\SdPuserController;
use App\Http\Controllers\StartController;
use App\Http\Controllers\SdEditorController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/**
 *  Die Original Route
 */
Route::get('/org', function () {
    return view('welcomeorg');
});

/**
 * Die index route
 */
Route::get('/', StartController::class);


/**
 * Pusers (Einsteller)
 */
Route::get('/puser/index', function () {
    return view('puser.index');
});

Route::get('/livewire/show-posts/{id}', function ($id) {
    return view('livewire.show-posts');
})->name('show-posts');




/**
 * Stammdaten   (kurz: sd)
 */
//Route::resource('/sd/puser', SdPuserController::class);
//
//Route::resource('/sd/pferde', SdPferdeController::class);

