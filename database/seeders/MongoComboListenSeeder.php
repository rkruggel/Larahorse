<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class MongoComboListenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::connection('mongodb')->collection('combolisten')->delete();

        DB::connection('mongodb')->collection('combolisten')->insert([

            ['itype' => 'screen',],

            ['itype' => 'data',
                'name' => 'anrede',
                'items' => ['Herr', 'Frau', 'Firma'],
            ],
            ['itype' => 'data',
                'name' => 'title',
                'items' => ['Dr.', 'Dr.Dr.', 'Prof.', 'Prof.Dr.', 'Dr.med.', 'Dr.med.vet',],
            ],
            ['itype' => 'data',
                'name' => 'zusatz',
                'items' => ['Dr.', 'Dr.Dr.', 'Prof.', 'Prof.Dr.', 'Dr.med.', 'Dr.med.vet',],
            ],
        ]);
    }
}
