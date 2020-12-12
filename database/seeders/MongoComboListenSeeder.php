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
            [
                'anrede' => [ 'Herr', 'Frau', 'Firma' ],
            ],

            [
                'title' => [ 'Dr.', 'Dr.Dr.', 'Prof.', 'Prof.Dr.', 'Dr.med.', 'Dr.med.vet', ],
            ],
            [
                'zusatz' => [ 'med.', 'med. vet.' ],
            ],

            [
                'bundesland' => [
                    'BB' => 'Brandenburg',
                    'BE' => 'Berlin',
                    'BW' => 'Baden-Württemberg',
                    'BY' => 'Bayern',
                    'HB' => 'Bremen',
                    'HE' => 'Hessen',
                    'HH' => 'Hamburg',
                    'MV' => 'Mecklenburg-Vorpommern',
                    'NI' => 'Niedersachsen',
                    'NW' => 'Nordrhein-Westfalen',
                    'RP' => 'Rheinland-Pfalz',
                    'SH' => 'Schleswig-Holstein',
                    'SL' => 'Saarland',
                    'SN' => 'Sachsen',
                    'ST' => 'Sachsen-Anhalt',
                    'TH' => 'Thüringen',
                ],
            ],

            [
                'land' => [
                    'de' => 'Deutschland',
                    'gb' => 'Vereinigtes Königreich',
                ],
            ],


        ]);
    }
}
