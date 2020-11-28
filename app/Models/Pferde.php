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

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pferde extends Model
{
    use HasFactory;

    protected $table = 'pferde';
}
