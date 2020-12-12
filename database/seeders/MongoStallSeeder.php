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

            [ 'itype' => 'screen'],

            [ 'itype' => 'data',
                'stallname' => 'Stall Claudia',
                'stalladresse' => '',
                'gruendung' => Carbon::create(1988, 7, 1)->toDateTimeString(),
                'bemerkung' => ''
            ],
            [ 'itype' => 'data',
                'stallname' => 'Allefeld',
                'stalladresse' => '',
                'gruendung' => Carbon::create(1960, 1, 1)->toDateTimeString(),
                'bemerkung' => ''
            ],
        ]);
    }
}

