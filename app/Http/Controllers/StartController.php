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
 * @file		StartController.php
 * @path		/home/roland/Develop/Larahorse/app/Http/Controllers/StartController.php
 * @lastChange	06.01.21, 15:49 by roland
 *
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Yaml\Yaml;
use App\Library\yamlData;

class StartController extends Controller
{

    public function __invoke()
    {
        // -- yaml daten lesen
        $yamlarray = yamlData::Read('main');

        // -- Der seitencontent
        $body = $yamlarray['page']['body'];

        session('lara.progname', '-.-');

        return view('start')
            -> with ('body', $body);
    }
}
