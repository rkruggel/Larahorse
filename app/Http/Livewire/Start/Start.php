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

use App\Library\YamlData;
use Livewire\Component;
use Symfony\Component\Yaml\Yaml;

session_start();

class Start extends Component
{
    public array $body;         // plan: entfallen

    public array $yamlsystem;
    public array $yamlmain;
    public string $tit;
    public string $progname;

    protected $listeners = ['saveProgEmit' => 'saveProgEmit'];

    public function mount()
    {
        $this->tit = 'lara';
        $ydSystem = new YamlData('main');
        $ydMain = new YamlData('main');
        $this->yamlsystem = $ydSystem->dataToArray();
        $this->yamlmain = $ydMain->dataToArray();


        // -- Der seitencontent
        $this->body = $this->yamlmain['page']['body'];

        $this->progname = '#.##';
    }

    public function saveProgEmit($value)
    {
        $this->progname = $_SESSION['lara']['progname'];
    }

    public function render()
    {
        return view('livewire.start.start')
            ->with('tit', $this->tit);
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
