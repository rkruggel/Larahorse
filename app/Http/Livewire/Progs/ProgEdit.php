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
 * @file		ProgEdit.php
 * @path		/home/roland/Develop/Larahorse/app/Http/Livewire/Progs/ProgEdit.php
 * @lastChange	08.01.21, 17:43 by roland
 *
 */

namespace App\Http\Livewire\Progs;

use App\Library\yamlData;
use Livewire\Component;

class ProgEdit extends Component
{
    public string $yamltext;

    public function mount( )
    {
        $a=0;
    }


    public function render()
    {
        $this->yamltext = yamlData::ReadText('main');

        return view('livewire.progs.prog-edit');
    }
}
