<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class MongoStallSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::connection('mongodb')->collection('stall')->delete();

        DB::connection('mongodb')->collection('stall')->insert([

            [ 'itype' => 'screen',
                'stallname' => [ 'anzeige'=>'Stallname', 'source'=>'stall.stallname', 'type'=>'string', 'len'=>'1:25:100', 'default'=>'', 'notnull'=>true ],
                'stalladresse' => [ 'anzeige'=>'Stalladresse', 'source'=>'stall.stalladresse', 'type'=>'string', 'len'=>'1:25:100', 'default'=>'', 'notnull'=>true],
                'gruendung' => [ 'anzeige'=>'Gründung', 'source'=>'stall.gruendung', 'type'=>'string', 'len'=>'1:25:100', 'default'=>'', 'notnull'=>true],
                'bemerkung' => [ 'anzeige'=>'Bemerkung', 'source'=>'stall.bemerkung', 'type'=>'string', 'len'=>'1:25:100', 'default'=>'', 'notnull'=>true],
            ],

            [ 'itype' => 'data',
                'stallname' => 'Stall Claudia',
                'stalladresse' => '',
                'gruendung' => Carbon::create(1988, 7, 1)->toDateTimeString(),
                'bemerkung' => '',
                'updated_at' => Carbon::now()->toDateTimeString(),
                'created_at' => Carbon::now()->toDateTimeString(),
            ],
            [ 'itype' => 'data',
                'stallname' => 'Allefeld',
                'stalladresse' => '',
                'gruendung' => Carbon::create(1960, 1, 1)->toDateTimeString(),
                'bemerkung' => '',
                'updated_at' => Carbon::now()->toDateTimeString(),
                'created_at' => Carbon::now()->toDateTimeString(),
            ],
        ]);
    }
}

