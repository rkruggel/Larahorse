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
 * @file		Start.php
 * @path		/home/roland/Develop/Larahorse/app/Http/Livewire/Start/Start.php
 * @lastChange	08.01.21, 18:03 by roland
 *
 */

namespace App\Http\Livewire\Start;

use App\Http\Controllers\Controller;
use App\Library\yamlData;
use Livewire\Component;

class Start extends Component
{
    public array $body;

    public function mount()
    {
        // -- yaml daten lesen
        $yamlarray = yamlData::Read('main');

        // -- Der seitencontent
        $this->body = $yamlarray['page']['body'];

        session('lara.progname', '-.-');

    }

    public function render()
    {
        return view('livewire.start.start');
    }
}

//class StartController extends Controller
//{
//
//    public function __invoke()
//    {
//        // -- yaml daten lesen
//        $yamlarray = yamlData::Read('main');
//
//        // -- Der seitencontent
//        $body = $yamlarray['page']['body'];
//
//        session('lara.progname', '-.-');
//
//        return view('start')
//            -> with ('body', $body);
//    }
//}
