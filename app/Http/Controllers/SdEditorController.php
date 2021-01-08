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
 * @file		SdEditorController.php
 * @path		/home/roland/Develop/Larahorse/app/Http/Controllers/SdEditorController.php
 * @lastChange	06.01.21, 15:57 by roland
 *
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SdEditorController extends Controller
{
    public function __invoke() {
        return view('editor');
    }
}
