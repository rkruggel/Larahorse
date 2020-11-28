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
 * @file		EinstellerSeeder.php
 * @path		/home/roland/Develop/Larahorse/database/seeders/EinstellerSeeder.php
 * @lastChange	20.11.20, 10:22 by roland
 */

namespace Database\Seeders;

use DateTime;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class EinstellerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('einstellers')->insert([
            'pusers_id' => DB::table('pusers')->where([
                            ['vorname', 'Roland'],
                            ['nachname', 'Kruggel'],
                        ])->first()->id,
            'type' => 'Einsteller',
            'usrpferd' => DB::table('userpferds')->where('pferdename', '=','Ladina')->first()->id,
            'jfield' => '{}',
            //'geb' => date("Y-m-d", strtotime('19850724' ) ) ,
            //'jtelefon' => '{}',
            'bemerkung' => 'dummy einsteller',
            'created_at' => new DateTime('now')
        ]);
    }
}
