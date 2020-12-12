<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use MongoDB;
use App\Library;

class MongoPferdeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::connection('mongodb')->collection('pferde')->delete();

        DB::connection('mongodb')->collection('pferde')->insert([
            [
              'itype' => 'screen',
                'name'      => [ 'anzeige'=>'Pferdename', 'source'=>'Pferde.name', 'type'=>'string',
                                 'len'=>'1:25:100', 'default'=>'', 'notnull'=>true],
                'rufname'   => [ 'anzeige'=>'Rufname', 'source'=>'Pferde.rufname', 'type'=>'string',
                                 'len'=>'1:25:100', 'default'=>'', 'notnull'=>false],
                'geboren'   => [ 'anzeige'=>'geboren', 'source'=>'Pferde.geboren', 'type'=>'date',
                                 'len'=>'1:30', 'default'=>Carbon::now()->toDateTimeString(), 'notnull'=>false],
                'rasse'     => [ 'anzeige'=>'Rasse', 'source'=>'Pferde.rasse', 'type'=>'combo', 'list'=>['Hannoveraner', 'Westphale', 'Haflinger'],
                                 'len'=>'1:30', 'default'=>'', 'notnull'=>false],
                'sex'       => [ 'anzeige'=>'Geschlecht', 'source'=>'Pferde.sex', 'type'=>'combo', 'list'=>['Stute', 'Hengst', 'Wallach'],
                                 'len'=>'1:30', 'default'=>'', 'notnull'=>false],
                'type'      => [ 'anzeige'=>'Pferdetype', 'source'=>'Pferde.type', 'type'=>'combo', 'list'=>['Warmblut', 'Kaltblut', 'Vollblut', 'Cob', 'Pony'],
                                 'len'=>'1:30', 'default'=>'', 'notnull'=>false],
                'zuechter'  => [ 'anzeige'=>'Züchter', 'source'=>'Pferde.zuechter', 'type'=>'id', 'link'=>'Puser name, ',
                                 'len'=>'', 'default'=>'0', 'notnull'=>false],
                'bemerkung' => [ 'anzeige'=>'Bemerkung', 'source'=>'Pferde.bemerkung', 'type'=>'string',
                                 'len'=>'4:100:-1', 'default'=>'', 'notnull'=>false],
                'updated_at' => Carbon::now()->toDateTimeString(),
                'created_at' => Carbon::now()->toDateTimeString(),
            ],
            // 'name' => ['anzeige'=>'', 'source'=>'', 'type'=>'', 'list'=>['combo1', 'combo2', 'combo3']
            //            'len'=>'', 'default'=>'', 'notnull'=>false],


            [ 'itype' => 'data',
                'name' => 'Ladina',
                'rufname' => 'Ladina',
                'geboren' => Carbon::create(1995, 2, 24)->toDateTimeString(),
                'rasse' => 'Hannoveraner',
                'sex' => 'Stute',
                'type' => 'Warmblut',
                'zuechter_id' => 0,
                'bemerkung' => 'Das Pferd von Roland',
                'updated_at' => Carbon::now()->toDateTimeString(),
                'created_at' => Carbon::now()->toDateTimeString(),
            ],

            [ 'itype' => 'data',
                'name' => 'Donnerlüttchen',
                'rufname' => 'Lütte',
                'geboren' => Carbon::create(1985, 3, 24)->toDateTimeString(),
                'rasse' => 'Westphale',
                'sex' => 'Stute',
                'type' => 'Warmblut',
                'zuechter_id' => 0,
                'bemerkung' => 'Das Pferd von Claudia',
                'updated_at' => Carbon::now()->toDateTimeString(),
                'created_at' => Carbon::now()->toDateTimeString(),
            ],

            [ 'itype' => 'data',
                'name' => 'Skyrose',
                'rufname' => 'Skyrose',
                'geboren' => Carbon::create(2015, 3, 24)->toDateTimeString(),
                'rasse' => 'Grosspferd',
                'sex' => 'Stute',
                'type' => 'Warmblut',
                'zuechter_id' => 0,
                'bemerkung' => 'Das Pferd von Arno',
                'updated_at' => Carbon::now()->toDateTimeString(),
                'created_at' => Carbon::now()->toDateTimeString(),
            ],

            [ 'itype' => 'data',
                'name' => 'Shakira',
                'rufname' => 'Shakira',
                'geboren' => Carbon::create(2014, 4, 20)->toDateTimeString(),
                'rasse' => 'Haflinger',
                'sex' => 'Stute',
                'type' => 'Pony',
                'zuechter_id' => 0,
                'bemerkung' => 'Meine Reitbeteiligung',
                'updated_at' => Carbon::now()->toDateTimeString(),
                'created_at' => Carbon::now()->toDateTimeString(),
            ],

            [ 'itype' => 'data',
                'name' => 'Charlie',
                'rufname' => 'Charlie',
                'geboren' => Carbon::create(2009, 1, 21)->toDateTimeString(),
                'rasse' => 'Haflinger',
                'sex' => 'Wallach',
                'type' => 'Pony',
                'zuechter_id' => 0,
                'bemerkung' => 'Meine Reitbeteiligung',
                'updated_at' => Carbon::now()->toDateTimeString(),
                'created_at' => Carbon::now()->toDateTimeString(),
            ],


        ]);
        $a = 0;


    }
}
