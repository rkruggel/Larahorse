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

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pusers extends Model
{
    use HasFactory;

    protected $casts = [
        'id' => 'int',
        'jtelefon' => 'array',
        'jfields' => 'array'
    ];
}
