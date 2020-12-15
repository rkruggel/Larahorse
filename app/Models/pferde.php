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
 * @file		Pferde.php
 * @path		/home/roland/Develop/Larahorse/app/Models/Pferde.php
 * @lastChange	20.11.20, 10:19 by roland
 */

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class pferde extends Eloquent
{
    protected $connection = 'mongodb';
}
