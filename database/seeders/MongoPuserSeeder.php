<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use MongoDB;
use App\Library;

class MongoPuserSeeder extends Seeder
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
        $collection = $client->Larahorse->Puser;

        // es gibt drei 'type'
        //   lists    => Auflistungen für komboboxen
        //   defaults => Defaultwerte die beim neueintrag vorbesetzt weden.
        //   data     => Die eigentlichen Daten
        $collection->insertMany([
            [ 'type' => 'lists',
                'anrede' => ['Herr', 'Frau', 'Firma',],
                'title' => ['Dr.', 'Prof.', 'Prof. Dr.', 'Prof. Dr. Dr.',],
                'zusatz' => ['med.', 'med. vet.'],
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
                'land' => [
                    'de' => 'Deutschland',
                    'gb' => 'Vereinigtes Königreich',
                    ],
                'aufgabe' => [
                    'Reitbeteiligung', 'Eigentümer', 'Pferdebesitzer', 'Ausbilder Pferd',
                    ],
            ],


            [ 'type' => 'defaults',
                'anrede' => 'Frau',
                'anschrift' => [
                    'bundesland' => 'NW',
                    'land' => 'de'
                ],
                'landsmann' => 'deutsch',
                'active' => [
                    'active' => true,
                    'startdate' => Library\MongoDate::dateJetztAry(),
                ],
            ],

            [ 'type' => 'data',
                'anrede' => 'Frau',
                'vorname' => 'Diana',
                'nachname' => 'Kreil',
                'title' => '',
                'rufname' => '',
                'zusatz' => '',
                'internet' => [
                    'email' => ['dk@gmx.de'],
                    'www' => [''],
                ],
                'anschrift' => [
                    'strasse' => 'Osemundstr.',
                    'hsnr' => '12a',
                    'plz' => '58553',
                    'ort' => 'Halver',
                    'bundesland' => 'NW',
                    'land' => 'de'
                ],
                'geb' => Library\MongoDate::dateJetztAry('1979-01-02'),
                'landsmann' => 'deutsch',
                'telefon' => [
                    'Mobil' => '0155 12456789',
                ],
                'active' => [
                    'active' => true,
                    'startdate' => '12.11.2020',
                ],
                'tier' => ['art' => 'Pferd', 'rasse' => 'Pony'],
                'aufgabe' => 'Pferdebesitzer',
                'bemerkung' => 'keine',
                'created_at' => Library\MongoDate::dateJetztAry(),
            ],
            [ 'type' => 'data',
                'anrede' => 'Herr',
                'vorname' => 'Roland',
                'nachname' => 'Kruggel',
                'title' => 'Prof.',
                'rufname' => '',
                'zusatz' => 'med. vet.',
                'internet' => [
                    'email' => ['rkruggel@bbf7.de', 'rkruggel@gmx.de', 'roland.kruggel@turck.com'],
                    'www' => ['www.bbf7.de'],
                ],
                'anschrift' => [
                    'strasse' => 'Beverstr.',
                    'hsnr' => '12',
                    'plz' => '58553',
                    'ort' => 'Halver',
                    'bundesland' => 'NW',
                    'land' => 'de'
                ],
                'geb' => Library\MongoDate::dateJetztAry('1959-01-02'),
                'landsmann' => 'deutsch',
                'telefon' => [
                    'Privat' => '02353 6699940',
                    'Geschäft' => '02353 7096271',
                    'Mobil' => '0174 2170044',
                    'Auto' => '01522 2532112512'
                ],
                'active' => [
                    'active' => true,
                    'startdate' => Library\MongoDate::dateJetztAry('2020-11-12'),
                ],
                'tier' => ['art' => 'Pferd', 'rasse' => 'Haflinger'],
                'aufgabe' => 'Reitbeteiligung',
                'bemerkung' => 'keine',
                'created_at' => Library\MongoDate::dateJetztAry(),
            ],

        ]);
        $a = 0;

    }
}
