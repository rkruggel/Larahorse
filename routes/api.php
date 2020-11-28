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
 * @file		api.php
 * @path		/home/roland/Develop/Larahorse/routes/api.php
 * @lastChange	20.11.20, 10:19 by roland
 */

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
//use App\Http\Controllers\API\MenuController;
use App\Http\Controllers\Api\EinstellerController;

//use App\Http\Controllers\ApiPuserController;
use Illuminate\Routing\Controller;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('puser', 'App\Http\Controllers\ApiPuserController@index');


/*
 * hier wird zum MenuController geroutet
 *
 * Url:
 *  http://localhost:8082/api/menu      => MenuController@index
 *  http://localhost:8082/api/menu/uu   => MenuController@show
 */
//Route::resource('menu', MenuController::class , [
//    'only' => ['index', 'show'],
//    'parameters' => ['index' => 'txt']
//]);

/**
 * ruft den Menucontroller 'main' auf
 *
 * @url http://localhost:8082/api/menu/master?txt=roland&trivia=100
 *      http://localhost:8082/api/menu/master
 *      http://localhost:8082/api/menu
 */
//Route::get('menu/{id?}', MenuController::class);

Route::apiResource('einsteller', EinstellerController::class);

