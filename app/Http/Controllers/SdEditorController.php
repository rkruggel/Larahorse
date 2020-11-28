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
 * @file		SdEditorController.php
 * @path		/home/roland/Develop/Larahorse/app/Http/Controllers/SdEditorController.php
 * @lastChange	20.11.20, 10:19 by roland
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SdEditorController extends Controller
{
    public function __invoke() {
        return view('editor');
    }
}
