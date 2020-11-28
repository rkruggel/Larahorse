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
 * @file		UserPferdSeeder.php
 * @path		/home/roland/Develop/Larahorse/database/seeders/UserPferdSeeder.php
 * @lastChange	20.11.20, 10:22 by roland
 */

namespace Database\Seeders;

use DateTime;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UserPferdSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jarzt = <<<EOD
{
  "arzt": [
    {
      "schmied" : [
        { "puser_id" : 21, "prio":1, "bemerkung" : "" },
        { "puser_id" : 22, "prio":2, "bemerkung" : "" },
        { "puser_id" : 24, "prio":3, "bemerkung" : "" }
      ],
      "tierarzt" : [
        { "puser_id" : 21, "prio":1, "bemerkung" : "" }
      ],
      "zahnarzt" : [
        { "puser_id" : 21, "prio":1, "bemerkung" : "" }
      ],
      "osteopath" : [
        { "puser_id" : 6, "prio":1, "bemerkung" : "" },
        { "puser_id" : 5, "prio":2, "bemerkung" : "" }
      ]
    }
  ]
}
EOD;
        $jpers = <<<EOD
{
  "personen": [
    {
      "reiter" : [
        { "puser_id" : 6, "prio":1, "bemerkung" : "" },
        { "puser_id" : 5, "prio":2, "bemerkung" : "" }
      ],
      "beteiligung" : [
        { "puser_id" : 6, "prio":1, "bemerkung" : "" }
      ]
    }
  ]
}
EOD;


        DB::table('userpferds')->insert([
            'pferdename' => 'Ladina',

            'jarzt' => $jarzt,
            'jpersonen' => $jpers,

            'futterplan' => 0,
            'weideplan' => 0,
            'bewegungsplan' => 0,
            'deckenplan' => 0,

            'misten' => 'abends',
            'einstreu' => 'Stroh',
            'medikamente' => 'keine',
            'jfield' => '[]',                //)->default(new Expression('(JSON_ARRAY())'));
            'bemerkung' => '',
            'created_at' => new DateTime('now')
        ]);
    }
}

