<?php
/*
 * Projekt  Larahorse
 * ----------------------------------------------------
 *
 * Copyright (c) 2020-2021,  Roland Kruggel
 * All Rights Reserved.
 * License: MIT
 *
 * @author		Roland Kruggel, rkruggel@bbf7.de
 * @file		web.php
 * @path		/home/roland/Develop/Larahorse/routes/web.php
 * @lastChange	08.01.21, 18:46 by roland
 *
 */

use App\Http\Controllers\SdPferdeController;
use App\Http\Controllers\SdPuserController;
//use App\Http\Controllers\StartController;
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

///**
// *  Die Original Route
// */
//Route::get('/org', function () {
//    return view('welcomeorg');
//});

/**
 * Die index route
 */
//Route::get('/', StartController::class);
Route::get('/', \App\Http\Livewire\Start\Start::class);


/**
 * Pusers (Einsteller)
 */
//Route::get('/puser/index', function () {
//    return view('puser.index');
//});
//
//Route::get('/livewire/show-posts/{id}', function ($id) {
//    return view('livewire.show-posts');
//})->name('show-posts');


//Route::get('/prog/admin', function () {
//    return view('livewire.prog-edit');
//})->name('prog-admin');

Route::get('/prog/admin', \App\Http\Livewire\Progs\ProgEdit::class);


/**
 * Stammdaten   (kurz: sd)
 */
//Route::resource('/sd/puser', SdPuserController::class);
//
//Route::resource('/sd/pferde', SdPferdeController::class);

