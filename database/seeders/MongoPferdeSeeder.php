<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
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
        $client = new MongoDB\Client("mongodb://localhost:27017");
//        $db = $client->Larahorse;

        // daten einstellen
        $collection = $client->Larahorse->Pferde;

        // es gibt drei 'type'
        //   screen => Anweisungen für die Screenerstellung
        //   data   => Die eigentlichen Daten
        $collection->insertMany([
//                'name' => ['anzeige'=>'', 'source'=>'', 'type'=>'', 'list'=>['combo1', 'combo2', 'combo3']
//                           'len'=>'', 'default'=>'', 'notnull'=>false],
            [
              'itype' => 'screen',
                'name'      => [ 'anzeige'=>'Pferdename', 'source'=>'Pferde.name', 'type'=>'string',
                                 'len'=>'1:25:100', 'default'=>'', 'notnull'=>true],
                'rufname'   => [ 'anzeige'=>'Rufname', 'source'=>'Pferde.rufname', 'type'=>'string',
                                 'len'=>'1:25:100', 'default'=>'', 'notnull'=>false],
                'geboren'   => [ 'anzeige'=>'geboren', 'source'=>'Pferde.geboren', 'type'=>'date',
                                 'len'=>'1:30', 'default'=>Library\MongoDate::dateJetztAry('2020-01-01'), 'notnull'=>false],
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
            ],


            [ 'itype' => 'data',
                'name' => 'Ladina',
                'rufname' => 'Ladina',
                'geboren' => Library\MongoDate::dateJetztAry('1999-02-24' ),
                'rasse' => 'Hannoveraner',
                'sex' => 'Stute',
                'type' => 'Warmblut',
                'zuechter_id' => 0,
                'bemerkung' => 'Das Pferd von Roland'
            ],

            [ 'itype' => 'data',
                'name' => 'Donnerlüttchen',
                'rufname' => 'Lütte',
                'geboren' => Library\MongoDate::dateJetztAry('1985-03-24' ),
                'rasse' => 'Westphale',
                'sex' => 'Stute',
                'type' => 'Warmblut',
                'zuechter_id' => 0,
                'bemerkung' => 'Das Pferd von Claudia'
            ],

            [ 'itype' => 'data',
                'name' => 'Skyrose',
                'rufname' => 'Skyrose',
                'geboren' => Library\MongoDate::dateJetztAry('2015-03-24' ),
                'rasse' => 'Grosspferd',
                'sex' => 'Stute',
                'type' => 'Warmblut',
                'zuechter_id' => 0,
                'bemerkung' => 'Das Pferd von Arno'
            ],

            [ 'itype' => 'data',
                'name' => 'Shakira',
                'rufname' => 'Shakira',
                'geboren' => Library\MongoDate::dateJetztAry('2014-04-20' ),
                'rasse' => 'Haflinger',
                'sex' => 'Stute',
                'type' => 'Pony',
                'zuechter_id' => 0,
                'bemerkung' => 'Meine Reitbeteiligung'
            ],

            [ 'itype' => 'data',
                'name' => 'Charlie',
                'rufname' => 'Charlie',
                'geboren' => Library\MongoDate::dateJetztAry('2009-01-21' ),
                'rasse' => 'Haflinger',
                'sex' => 'Wallach',
                'type' => 'Pony',
                'zuechter_id' => 0,
                'bemerkung' => 'Meine Reitbeteiligung'
            ],


        ]);
        $a = 0;


    }
}
