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
 * @file		PferdeSeeder.php
 * @path		/home/roland/Develop/Larahorse/database/seeders/PferdeSeeder.php
 * @lastChange	20.11.20, 10:22 by roland
 */

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PferdeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pf1 = DB::table('pusers')->where([
            ['vorname', 'Petra'],
            ['nachname', 'Kruggel'],
        ])->first()->id;
        $pf2 = DB::table('pusers')->where('nachname', 'Mista')->first()->id;
        $pf3 = DB::table('pusers')->where('nachname', 'Sida')->first()->id;

        DB::table('pferdes')->insert([
            /*
            'name' => 'Sanders',
            'vorname' => 'Svenja',
            'anschrift' => '',
            //'geb' => date("Y-m-d", strtotime('19850724' )),
            'landsmann' => 'deutsch',
            //'telefon' => 'nicht fertig',
            //'jtelefon' => '{}',
            //'bemerkung' => 'dummy adresse',
            'created_at' => new DateTime('now')
            */

            'name' => 'Ladina',
            'rufname' => 'Ladina',
            'geboren' => date("Y-m-d", strtotime('19990224' )),
            'rasse' => 'Hannoveraner',
            'sex' => 'Stute',
            'type' => 'Warmblut',
            'zuechter_id' => $pf1,
            'bemerkung' => 'Das Pferd von Roland'
        ]);

        $pf1 = DB::table('pusers')->where([
                        ['vorname', 'like', 'Tho%'],
                ])->first()->id;
        DB::table('pferdes')->insert([
            'name' => 'Donnerlüttchen',
            'rufname' => 'Lütte',
            'geboren' => date("Y-m-d", strtotime('19850324' )),
            'rasse' => 'Westphale',
            'sex' => 'Stute',
            'type' => 'Warmblut',
            'zuechter_id' => $pf2,
            'bemerkung' => 'Das Pferd von Claudia'
        ]);

        DB::table('pferdes')->insert([
            'name' => 'Skyrose',
            'rufname' => 'Skyrose',
            'geboren' => date("Y-m-d", strtotime('20150324' )),
            'rasse' => 'Grosspferd',
            'sex' => 'Stute',
            'type' => 'Warmblut',
            'zuechter_id' => $pf2,
            'bemerkung' => 'Das Pferd von Arno'
        ]);

        DB::table('pferdes')->insert([
            'name' => 'Shakira',
            'rufname' => 'Shakira',
            'geboren' => date("Y-m-d", strtotime('20140420' )),
            'rasse' => 'Haflinger',
            'sex' => 'Stute',
            'type' => 'Pony',
            'zuechter_id' => $pf3,
            'bemerkung' => 'Meine Reitbeteiligung'
        ]);
        DB::table('pferdes')->insert([
            'name' => 'Charlie',
            'rufname' => 'Charlie',
            'geboren' => date("Y-m-d", strtotime('20090121' )),
            'rasse' => 'Haflinger',
            'sex' => 'Wallach',
            'type' => 'Pony',
            'zuechter_id' => $pf2,
            'bemerkung' => 'Meine Reitbeteiligung'
        ]);

    }
}
