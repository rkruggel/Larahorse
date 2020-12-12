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
 * @file		ShowPosts.php
 * @path		/home/roland/Develop/Larahorse/app/Http/Livewire/ShowPosts.php
 * @lastChange	20.11.20, 10:19 by roland
 */

//namespace App\Http\Livewire;
//
//use Livewire\Component;
//
//class ShowPosts extends Component
//{
//    public $count;
//
//    public function mount()
//    {
//        $this->reset();
//    }
//
//    public function reset(...$properties)
//    {
//        $this->count = 0;
//    }
//
//    public function render()
//    {
//        return view('livewire.show-posts', ['count' => $this->count] );
//    }
//}

namespace App\Http\Livewire;

use App\Models\pusers;
use Livewire\Component;

class ShowPosts extends Component
{
    public $puser;

    public function mount($id) {
        $this->puser = pusers::find($id);
    }

    public function render()
    {
        return view('livewire.show-posts');
    }
}
