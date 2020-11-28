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
 * @file		StallSeeder.php
 * @path		/home/roland/Develop/Larahorse/database/seeders/StallSeeder.php
 * @lastChange	20.11.20, 10:22 by roland
 */

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class StallSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('stalls')->insert([
            /*
            'name' => 'Sanders',
            'vorname' => 'Svenja',
            'anschrift' => '',
            //'geb' => date("Y-m-d", strtotime('19850724' ) ) ,
            'landsmann' => 'deutsch',
            //'telefon' => 'nicht fertig',
            //'jtelefon' => '{}',
            //'bemerkung' => 'dummy adresse',
            'created_at' => new DateTime('now')
            */
            'stallname' => 'Stall Claudia',
            //'stalladdresse_id' => 0,
            //'betreiber_id' => 0,
            'gruendung' => date("Y-m-d", strtotime('19880701' ) ),
            'bemerkung' => ''
        ]);
        DB::table('stalls')->insert([
            'stallname' => 'Allefeld',
            //'stalladdresse_id' => 0,
            //'betreiber_id' => 0,
            'gruendung' => date("Y-m-d", strtotime('19601101' ) ),
            'bemerkung' => ''
        ]);


    }
}
