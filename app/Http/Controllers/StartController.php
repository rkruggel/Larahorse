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
 * @file		StartController.php
 * @path		/home/roland/Develop/Larahorse/app/Http/Controllers/StartController.php
 * @lastChange	20.11.20, 10:19 by roland
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;

class StartController extends Controller
{

    public function __invoke() {
        session('progname', '-.-');
        return view('start');
    }
}
