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
 * @file		SearchUser.php
 * @path		/home/roland/Develop/Larahorse/app/View/Components/SearchUser.php
 * @lastChange	20.11.20, 10:19 by roland
 */

namespace App\View\Components;

use Illuminate\View\Component;

class SearchUser extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.search-user');
    }
}
