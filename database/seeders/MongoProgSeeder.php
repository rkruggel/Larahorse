<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;


use App\Models\progs;


class MongoProgSeeder extends Seeder
{



    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::connection('mongodb')->collection('progs')->delete();

        DB::connection('mongodb')->collection('progs')->insert([
            [ 'itype' => 'screen',
                'name'   => [ 'anzeige'=>'Progname', 'source'=>'Progs.name', 'type'=>'string',
                              'len'=>'1:30:50', 'default'=>'', 'notnull'=>false],

                'date' => [ 'anzeige'=>'Datum', 'source'=>'Progs.date', 'type'=>'date',
                            'len'=>'1:30', 'default'=>Carbon::now()->toDateTimeString(), 'notnull'=>false ],

                'active' => [ 'anzeige'=>'Aktiv', 'source'=>'Progs.active', 'type'=>'checkbox',
                              'len'=>'', 'default'=>true, 'notnull'=>false ],

                'user'   => [ 'anzeige'=>'Eigentümer', 'source'=>'Progs.user', 'type'=>'string',
                              'len'=>'1:30:100', 'default'=>'', 'notnull'=>false ],

                'desc'   => [ 'anzeige'=>'Beschreibung', 'source'=>'Progs.desc', 'type'=>'string',
                            'len'=>'4:100:-1', 'default'=>'', 'notnull'=>false ],
                'updated_at' => Carbon::now()->toDateTimeString(),
                'created_at' => Carbon::now()->toDateTimeString(),
            ],
            [ 'itype' => 'data',
                'name' => 'Stall',
                'date' => Carbon::create(2020, 8, 21)->toDateTimeString(),
                'active' => true,
                'user' => 'roland',
                'desc' => 'Die Stallverwaltung',
                'updated_at' => Carbon::now()->toDateTimeString(),
                'created_at' => Carbon::now()->toDateTimeString(),
            ],
            [ 'itype' => 'data',
                'name' => 'Angeln',
                'date' => Carbon::create(2020, 12, 1)->toDateTimeString(),
                'active' => true,
                'user' => 'roland',
                'desc' => 'Verwaltung für Angelvereine',
                'updated_at' => Carbon::now()->toDateTimeString(),
                'created_at' => Carbon::now()->toDateTimeString(),
            ],
            [ 'itype' => 'data',
                'name' => 'Knitting',
                'date' => Carbon::now()->toDateTimeString(),
                'active' => true,
                'user' => 'petra',
                'desc' => 'Stricktreffen und Projekte',
                'updated_at' => Carbon::now()->toDateTimeString(),
                'created_at' => Carbon::now()->toDateTimeString(),
            ],
            [ 'itype' => 'data',
                'name' => 'Unding',
                'date' => Carbon::now('CET')->toDateTimeString(),
                'active' => false,
                'user' => 'erich',
                'desc' => 'Lagerverwaltung für Strassenbau',
                'updated_at' => Carbon::now()->toDateTimeString(),
                'created_at' => Carbon::now()->toDateTimeString(),
            ],
            [ 'itype' => 'data',
                'name' => 'Umbau',
                'date' => Carbon::create(2020, 1, 2)->toDateTimeString(),
                'active' => true,
                'user' => 'roland',
                'desc' => 'Verwaltung für Umbauten und Renovierungen',
                'updated_at' => Carbon::now()->toDateTimeString(),
                'created_at' => Carbon::now()->toDateTimeString(),
            ]

        ]);


        $tt = new progs();
        $tt->itype = 'data';
        $tt->name = 'ich';
        $tt->date = Carbon::now()->toDateTimeString();
        $tt->active = true;
        $tt->user = 'roland';
        $tt->desc = 'Verwaltung für Umbauten und Renovierungen';
        $tt->save();

        $a = 0;
    }
}
