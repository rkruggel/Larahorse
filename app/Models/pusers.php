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
 * @file		Pusers.php
 * @path		/home/roland/Develop/Larahorse/app/Models/Pusers.php
 * @lastChange	20.11.20, 10:19 by roland
 */

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class pusers extends Eloquent
{
    protected $connection = 'mongodb';

//    protected $casts = [
//        'jtelefon' => 'array',
//        'jfields' => 'array'
//    ];
}
