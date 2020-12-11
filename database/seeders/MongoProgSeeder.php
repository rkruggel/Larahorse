<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use MongoDB;
use App\Library;

class MongoProgSeeder extends Seeder
{



    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $client = new MongoDB\Client("mongodb://localhost:27017");

        // daten einstellen
        $collection = $client->Larahorse->Progs;

//                'name' => [ 'anzeige'=>'', 'source'=>'', 'type'=>'', 'list'=>['combo1', 'combo2', 'combo3'],
//                           'len'=>'', 'default'=>'', 'notnull'=>false ],

        $collection->insertMany([
            [ 'type' => 'screen',
                'name'   => [ 'anzeige'=>'Progname', 'source'=>'Progs.name', 'type'=>'string',
                              'len'=>'1:30:50', 'default'=>'', 'notnull'=>false],

                'date' => [ 'anzeige'=>'Datum', 'source'=>'Progs.date', 'type'=>'date',
                            'len'=>'1:30', 'default'=>Library\MongoDate::dateJetztAry(), 'notnull'=>false ],

                'active' => [ 'anzeige'=>'Aktiv', 'source'=>'Progs.active', 'type'=>'checkbox',
                              'len'=>'', 'default'=>true, 'notnull'=>false ],

                'user'   => [ 'anzeige'=>'Eigentümer', 'source'=>'Progs.user', 'type'=>'string',
                              'len'=>'1:30:100', 'default'=>'', 'notnull'=>false ],

                'desc'   => [ 'anzeige'=>'Beschreibung', 'source'=>'Progs.desc', 'type'=>'string',
                            'len'=>'4:100:-1', 'default'=>'', 'notnull'=>false ],
            ],

            [ 'type' => 'data',
                'name' => 'Stall',
                'date' => Library\MongoDate::dateJetztAry('2020-08-21'),
                'active' => true,
                'user' => 'roland',
                'desc' => 'Die Stallverwaltung'
            ],
            [ 'type' => 'data',
                'name' => 'Angeln',
                'date' => Library\MongoDate::dateJetztAry('2020-12-01'),
                'active' => true,
                'user' => 'roland',
                'desc' => 'Verwaltung für Angelvereine'
            ],
            [ 'type' => 'data',
                'name' => 'Knitting',
                'date' => Library\MongoDate::dateJetztAry(),
                'active' => true,
                'user' => 'petra',
                'desc' => 'Stricktreffen und Projekte'
            ],
            [ 'type' => 'data',
                'name' => 'Unding',
                'date' => Library\MongoDate::dateJetztAry(),
                'active' => false,
                'user' => 'erich',
                'desc' => 'Lagerverwaltung für Strassenbau'
            ],
            [ 'type' => 'data',
                'name' => 'Umbau',
                'date' => Library\MongoDate::dateJetztAry(2020-02-01),
                'active' => true,
                'user' => 'roland',
                'desc' => 'Verwaltung für Umbauten und Renovierungen'
            ]
        ]);
        $a = 0;

    }
}
