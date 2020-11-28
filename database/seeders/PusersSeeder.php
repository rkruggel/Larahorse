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
 * @file		PusersSeeder.php
 * @path		/home/roland/Develop/Larahorse/database/seeders/PusersSeeder.php
 * @lastChange	20.11.20, 10:22 by roland
 */

namespace Database\Seeders;

/*
 * Daten von
 * https://migano.de/testdaten.php
 */

/*
 * Datenbaken neu erstellen und Daten hinzufügen
 *   php artisan migrate:fresh --seed
 */

use App\Library\JsonDbDaten;
use App\Library\Helpers;
use DateTime;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use phpDocumentor\Reflection\Types\This;
use PHPUnit\TextUI\Help;


/**
 * Class PuserSeeder
 * @package Database\Seeders
 */
class PusersSeeder extends Seeder
{

    /**
     * @return string
     */
    private static function __xjsonstring_config(): string
    {
        return '
{
  "meta" : {
    "fieldtype"  : ["string", "text", "number", "integer", "combo", "date"]
  },
  "config" : {
    "landsmann" : {
      "order"   : 2,
      "anzeige" : "Landsm.",
      "type"    : "string",
      "format"  : "",
      "default" : "deutscher"
    },
    "gehalt" : {
      "order"   : 8,
      "anzeige" : "Verdienst",
      "type"    : "number",
      "format"  : "",
      "default" : 122000.00
    },
    "anrede" : {
      "order"   : 4,
      "anzeige" : "Anrede",
      "type"    : "combo",
      "format"  : "Herr, Frau",
      "default" : "Herr"
    },
    "titel" : {
      "order"   : 6,
      "anzeige" : "Titel",
      "type"    : "combo",
      "format"  : "Dr., Prof., Prof. Dr., Prof. Dr. Dr., Dr. Dr.",
      "default" : ""
    },
    "startdate" : {
      "order"   : 10,
      "anzeige" : "Startdatum",
      "type"    : "date",
      "format"  : "dd.MM.yyyy",
      "default" : "22.01.2020"
    },
    "bem" : {
      "order"   : 12,
      "anzeige" : "Bemerkung",
      "type"    : "text",
      "format"  : "",
      "default" : "keine Bmerkung"
    }
  }
}
';
    }


    /**
     * @return string
     */
    private static function __xjsonstring_daten(): string
    {
        //todo muss aufgesplittet werden. Config und Meta müssen in ID 1 gespeichert werden. Nicht mehr in jeder Row
        return '
{
  "data" : {
    "landsmann" : {
      "gruppe" : "test",
      "value"   : null
    },
    "gehalt" : {
      "gruppe" : "test",
      "value"   : null
    },
    "anrede" : {
      "gruppe" : "test",
      "value"   : null
    },
    "titel" : {
      "gruppe" : "test",
      "value"   : null
    },
    "startdate" : {
      "gruppe" : "test",
      "value"   : null
    },
    "bem" : {
      "gruppe" : "test",
      "value"   : null
    }
  }
}
';
    }

    /**
     * @return array
     */
    public static function __getjson_config(): array {
        return Helpers::string2json(self::__xjsonstring_config());
    }


    /**
     * @return array
     */
    public static function __getjson_daten(): array {
        return Helpers::string2json(self::__xjsonstring_daten());
    }


    /**
     * @param mixed $dta
     * @param array $params
     */
    private static function __updateData($dta, array $params)
    {
        $data = $dta['data'];

        foreach (array_keys($data) as $item) {
            $data[$item]['value'] = $params[$item];
        }
        return $data;
    }


    /**
     * @param $params
     * @return string
     */
    public static function __xjsondata($params)
    {
        $dta = self::__getjson_daten();

        $dta = PusersSeeder::__updateData($dta, $params);

        $a = 0;

        // umwandeln zum string
        return Helpers::json2string($dta);
    }


    private function __xdata($vari, $pos = 0)
    {
        $xvorname = ["Frau,Nancy,Nani", "Herr,Andrew,Andi", "Frau,Janet,", "Frau,Margaret,", "Herr,Steven,Stiv", "Herr,Michael,", "Herr,Robert,", "Frau,Laura,", "Frau,Annemarie,Ann"];
        $xnachname = ['Müller', 'Meier', 'Schulz', 'Albolia', 'Misaturix', 'Atupita', 'Isopylatix', 'Schmidt', 'Schulze', 'Erlen', 'Fink', 'Fuchs'];
        $xtitle = ['Dr.', 'Dr. med.', 'Prof', '', '', '', '', ''];
        $xzusatz = ['Einsteller', 'Tierarzt', 'Osteopath', 'Schmied', 'Einsteller', 'Einsteller', 'Einsteller', 'Einsteller', 'Einsteller',];
        $xanschrift = ['Alter Weiher 32, 72813 Sankt Johann', 'Leipziger Straße 87, 66851 Horbach', 'Kesseler Straße 126, 54608 Bleialf', 'Im Brünnlislehen 198, 89179 Beimerstetten', 'Erftweg 29, 93102 Pfatter', 'Im Mühlental 196, 55278 Köngernheim', 'Im Kirchenbungert 2 a, 97516 Oberschwarzach', 'Birkenallee 45, 89198 Westerstetten', 'Hirschberger Straße 20, 49688 Lastrup', 'Nistertalstraße 165, 12247 Berlin', 'Hoove 130, 16547 Birkenwerder', 'Karl-Marx-Straße 173, 24399 Arnis', 'Am Limes 118, 25361 Süderau', 'Eickendorf 104, 72818 Trochtelfingen',
            'Kleine Dorfstraße 41, 95506 Kastl', 'Immelmannstraße 60, 24232 Schönkirchen', 'Adolf-Kolping-Straße 106, 58099 Hagen', 'Am Bergacker 147, 68649 Groß-Rohrheim', 'Im Rauenstück 140, 90429 Nürnberg', 'Karl-Kaufmann-Weg 86, 57537 Mittelhof', 'Hofgasse 96, 27616 Frelsdorf', 'Altwieder Straße 74, 66909 Herschweiler-Pettersheim', 'Bungert 6, 54579 Üxheim', 'Rabenkamp 108, 31712 Niedernwöhren', 'Oberseifener Straße 173, 97239 Aub', 'Ostendstraße 163, 55471 Ravengiersburg', 'Gleditschstraße 29, 85119 Ernsgaden'];
        $xtelefon = ['02351 25122', '02351 63255', '01252 254112', '05221 235663', '05211 96233', '02535 23220', '02353 51124', '02353 29885', '02353 6699940', '069 652212', '02355 63221', '05221 9852554', '02366 369559'];
        $xaufgabe = ['Pferd', 'Reitbeteiligung', 'Pferd', 'Reitbeteiligung', 'Pferd', 'Boxenpflege', 'Reitbeteiligung', 'Reitbeteiligung', 'Tierpfleger', 'Pferd', 'Pferd', 'Pferd', 'Trainer', 'Pferd', 'Zuschauer'];
        $xbemerkung = file_get_contents('http://loripsum.net/api/1/medium/plaintext');;
        $tele = [
            'vorname' => $xvorname,
            'nachname' => $xnachname,
            'title' => $xtitle,
            'zusatz' => $xzusatz,
            'anschrift' => $xanschrift,
            'telefon' => $xtelefon,
            'aufgabe' => $xaufgabe,
            'bemerkung' => [],      // siehe unten
        ];
        $ttx = $tele[$vari];
        //echo  implode("-", $ttx);

        $randint = random_int(0, count($ttx) - 1);

        $tgg = $ttx[$randint];

        return $tgg;
    }


    /**
     * Run the database seeds.
     *
     * @return void
     * @throws \Exception
     */
    public function run()
    {
        DB::table('pusers')->insert([
            'aktive' => 0,
            'nachname' => 'xxConfigxx',
            'jfield' => json_encode( PusersSeeder::__getjson_config() ),
            'created_at' => new DateTime('now'),
        ]);
        DB::table('pusers')->insert([
            //'name' => Str::random(10),
            //'password' => Hash::make('password'),
            'anrede' => 'Herr',
            'vorname' => 'Roland',
            'nachname' => 'Kruggel',
            'title' => 'Prof.',
            'rufname' => '',
            'zusatz' => 'Kümmert sich um alles. Ist immer der doofe.',
            'email' => 'rkruggel@bbf7.de',
            'www' => 'www.bbf7.de',
            'anschrift' => 'Beverstr. 12, 58553 Halver',
            'geb' => date("Y-m-d", strtotime('19590102')),
            'landsmann' => 'deutsch',
            'jtelefon' => '[
                {"key": "Privat", "value": "02353 6699940"},
                {"key": "Geschäft", "value": "02353 7096271"},
                {"key": "Mobil", "value": "0174 2170044"},
                {"key": "Auto", "value": "' . $this->__xdata('telefon') . '"}
            ]',
            'jfield' => PusersSeeder::__xjsondata(
                ['landsmann' => 'deutsch', 'gehalt' => 65000, 'anrede' => 'Herr', 'titel' => 'TITEL1', 'startdate' => '12.11.2020', 'bem' => 'keine Bemerkung']
            ),
            'aufgabe' => 'Reitbeteiligung',
            'bemerkung' => 'keine',
            'created_at' => new DateTime('now'),
        ]);
        DB::table('pusers')->insert([
            'anrede' => 'Frau',
            'vorname' => 'Petra',
            'nachname' => 'Kruggel',
            'title' => '',
            'rufname' => '',
            'zusatz' => '',
            'email' => Str::random(10) . '@gmail.com',
            'www' => 'www.' . Str::random(5) . '.com',
            'anschrift' => 'Beverstr. 12, 58553 Halver',
            'geb' => date("Y-m-d", strtotime('19540203')),
            'landsmann' => 'deutsch',
            'jtelefon' => '[
                {"key": "Privat", "value": "02353 6699940"},
                {"key": "Mobil", "value": "0174 2170044"},
                {"key": "Auto", "value": "' . $this->__xdata('telefon') . '"}
            ]',
            'jfield' => PusersSeeder::__xjsondata(
                ['landsmann' => 'deutsch', 'gehalt' => 65000, 'anrede' => 'Herr', 'titel' => 'TITEL1', 'startdate' => '12.11.2020', 'bem' => 'keine Bemerkung']
            ),
            'aufgabe' => 'Zuschauer',
            'bemerkung' => 'keine',
            'created_at' => new DateTime('now')
        ]);
        DB::table('pusers')->insert([
            'anrede' => 'Herr',
            'title' => '',
            'vorname' => 'Thomas',
            'nachname' => 'Mista',
            'rufname' => 'Tom',
            'zusatz' => 'Pferdezüchter',
            'email' => Str::random(10) . '@gmail.com',
            'www' => 'www.' . Str::random(5) . '.com',
            'anschrift' => 'Hauptstr. 10, 58511 Lüdenscheid',
            'geb' => date("Y-m-d", strtotime('19850724')),
            'landsmann' => 'deutsch',
            'jtelefon' => '[
                {"key": "Privat", "value": "069 521411"},
                {"key": "Mobil", "value": "0177 63225142"},
                {"key": "Mobil", "value": "0177 422541225"},
                {"key": "Auto", "value": "' . $this->__xdata('telefon') . '"}
            ]',
            'jfield' => Helpers::json2string([]),
            'aufgabe' => 'Pferd',
            'bemerkung' => 'dummy adresse',
            'created_at' => new DateTime('now')
        ]);
        DB::table('pusers')->insert([
            'anrede' => 'Herr',
            'title' => '',
            'vorname' => 'Trima',
            'nachname' => 'Sida',
            'rufname' => '',
            'zusatz' => 'Pferdezüchter',
            'email' => Str::random(10) . '@gmail.com',
            'www' => 'www.' . Str::random(5) . '.com',
            'anschrift' => 'Hauptstr. 12, 58511 Lüdenscheid',
            'geb' => date("Y-m-d", strtotime('19850724')),
            'landsmann' => 'deutsch',
            'jtelefon' => '[
                {"key": "Auto", "value": "' . $this->__xdata('telefon') . '"}
            ]',
            'jfield' => Helpers::json2string([]),
            'aufgabe' => 'Pferd, Trainer',
            'bemerkung' => 'dummy adresse',
            'created_at' => new DateTime('now')
        ]);
        DB::table('pusers')->insert([
            'anrede' => 'Frau',
            'title' => '',
            'vorname' => 'Svenja',
            'nachname' => 'Sanders',
            'rufname' => '',
            'zusatz' => '',
            'email' => Str::random(10) . '@gmail.com',
            'www' => 'www.' . Str::random(5) . '.com',
            'anschrift' => '',
            //'geb' => date("Y-m-d", strtotime('19850724' ) ) ,
            'landsmann' => 'deutsch',
            'jtelefon' => '[
                {"key": "Auto", "value": "' . $this->__xdata('telefon') . '"}
            ]',
            'jfield' => Helpers::json2string([]),
            'aufgabe' => $this->__xdata('aufgabe'),
            //'bemerkung' => 'dummy adresse',
            'created_at' => new DateTime('now')
        ]);
        DB::table('pusers')->insert([
            'anrede' => 'Frau',
            'title' => '',
            'vorname' => 'Claudia Anne',
            'nachname' => 'Ludovici',
            'rufname' => 'Claudia',
            'zusatz' => 'Stallbetreiberin',
            'email' => Str::random(10) . '@gmail.com',
            'www' => 'www.' . Str::random(5) . '.com',
            'anschrift' => 'Grüne 1, Breckerfeld',
            //'geb' => date("Y-m-d", strtotime('19850724' ) ) ,
            'landsmann' => 'deutsch',
            'jtelefon' => '[
                {"key": "Auto", "value": "' . $this->__xdata('telefon') . '"}
            ]',
            'jfield' => Helpers::json2string([]),
            'aufgabe' => 'Pferd',
            //'bemerkung' => 'dummy adresse',
            'created_at' => new DateTime('now')
        ]);
        DB::table('pusers')->insert([
            'anrede' => 'Herr',
            'title' => '',
            'vorname' => 'Arno',
            'nachname' => 'Kefenbaum',
            'rufname' => '',
            'zusatz' => '',
            'email' => Str::random(10) . '@gmail.com',
            'www' => 'www.' . Str::random(5) . '.com',
            'anschrift' => 'Grüne 1, Breckerfeld',
            //'geb' => date("Y-m-d", strtotime('19850724' ) ) ,
            'landsmann' => 'deutsch',
            'jtelefon' => '[
                {"key": "Auto", "value": "' . $this->__xdata('telefon') . '"}
            ]',
            'jfield' => Helpers::json2string([]),
            'aufgabe' => $this->__xdata('aufgabe'),
            //'bemerkung' => 'dummy adresse',
            'created_at' => new DateTime('now')
        ]);
        DB::table('pusers')->insert([
            'anrede' => 'Firma',
            'title' => '',
            'vorname' => '',
            'nachname' => 'Stall Claudia',
            'rufname' => '',
            'zusatz' => 'Pferdestall und Boxenvermietung',
            'email' => Str::random(10) . '@gmail.com',
            'www' => 'www.' . Str::random(5) . '.com',
            'anschrift' => 'Grüne 1, Breckerfeld',
            //'geb' => date("Y-m-d", strtotime('19850724' ) ) ,
            'landsmann' => 'deutsch',
            'jtelefon' => '[
                {"key": "Auto", "value": "' . $this->__xdata('telefon') . '"}
            ]',
            'jfield' => Helpers::json2string([]),
            'aufgabe' => '',
            //'bemerkung' => 'dummy adresse',
            'created_at' => new DateTime('now')
        ]);
        DB::table('pusers')->insert([
            'anrede' => 'Frau',
            'title' => '',
            'vorname' => 'Diana',
            'nachname' => 'Kreil',
            'rufname' => 'Diana',
            'zusatz' => 'Physio und Bodenarbeitslehrerin',
            'email' => Str::random(10) . '@gmail.com',
            'www' => 'www.' . Str::random(5) . '.com',
            'anschrift' => 'Osemundstr. 12a, 58091 Hagen',
            'geb' => date("Y-m-d", strtotime('19790101')),
            'landsmann' => 'deutsch',
            'jtelefon' => '[
                {"key": "Auto", "value": "' . $this->__xdata('telefon') . '"}
            ]',
            'jfield' => Helpers::json2string([]),
            'aufgabe' => 'Pferd, Trainer',
            //'bemerkung' => 'dummy adresse',
            'created_at' => new DateTime('now')
        ]);
        DB::table('pusers')->insert([
            'anrede' => 'Frau',
            'title' => '',
            'vorname' => 'Susanne',
            'nachname' => 'Schäfer',
            'rufname' => 'Susi',
            'zusatz' => 'Stammdatenstelle',
            'email' => Str::random(10) . '@gmail.com',
            'www' => 'www.' . Str::random(5) . '.com',
            'anschrift' => 'Halver',
            'geb' => date("Y-m-d", strtotime('19610101')),
            'landsmann' => 'deutsch',
            'jtelefon' => '[
                {"key": "Auto", "value": "' . $this->__xdata('telefon') . '"}
            ]',
            'jfield' => Helpers::json2string([]),
            'aufgabe' => $this->__xdata('aufgabe'),
            //'bemerkung' => 'dummy adresse',
            'created_at' => new DateTime('now')
        ]);

        for ($i = 0; $i < 15; $i++) {
            $an = $this->__xdata('vorname');              // => "Herr,Roland"
            $co = random_int(0, 2) + 1;

            DB::table('pusers')->insert([
                'anrede' => explode(',', $an)[0],
                'title' => $this->__xdata('title'),
                'vorname' => explode(',', $an)[1],
                'nachname' => $this->__xdata('nachname'),
                'rufname' => explode(',', $an)[2],
                'zusatz' => $this->__xdata('zusatz'),
                'email' => Str::random(10) . '@gmail.com',
                'www' => 'www.' . Str::random(5) . '.com',
                'anschrift' => $this->__xdata('anschrift'),
                'geb' => date("Y-m-d", strtotime('19610101')),
                'landsmann' => 'deutsch',
                'jtelefon' => '[
                    {"key": "Auto", "value": "' . $this->__xdata('telefon') . '"}
                ]',
                'jfield' => Helpers::json2string([]),
                'aufgabe' => $this->__xdata('aufgabe'),
                'bemerkung' => file_get_contents('http://loripsum.net/api/1/medium/plaintext'),
                'created_at' => new DateTime('now')
            ]);
        }
    }
}
