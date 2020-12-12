<?php

namespace Database\Seeders;

use App\Library\Helpers;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class MongoPuserSeeder extends Seeder
{


//  "meta" : {
//    "fieldtype"  : ["string", "text", "number", "integer", "combo", "date"]

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
     */
    public function run()
    {
        DB::connection('mongodb')->collection('pusers')->delete();

        DB::connection('mongodb')->collection('pusers')->insert([

            // es gibt drei 'type'
            //   lists    => Auflistungen für komboboxen
            //   defaults => Defaultwerte die beim neueintrag vorbesetzt weden.
            //   data     => Die eigentlichen Daten
            [ 'itype' => 'screen',
                'anrede'    => [ 'anzeige'=>'Anrede', 'source'=>'puser.anrede', 'type'=>'combo', 'list'=>'combolisten.anrede',
                                 'len'=>'1:25:100', 'default'=>'Frau', 'notnull'=>true ],
                'vorname'   => [ 'anzeige'=>'Vorname', 'source'=>'puser.vorname', 'type'=>'string',
                                 'len'=>'1:25:100', 'default'=>'', 'notnull'=>true ],
                'nachname'  => [ 'anzeige'=>'Nachname', 'source'=>'puser.nachname', 'type'=>'string',
                                 'len'=>'1:25:100', 'default'=>'', 'notnull'=>true ],
                'title'     => [ 'anzeige'=>'Title', 'source'=>'puser.title', 'type'=>'combo', 'list'=>'combolisten.title',
                                 'len'=>'1:25:100', 'default'=>'', 'notnull'=>true ],
                'rufname'   => [ 'anzeige'=>'Rufname', 'source'=>'puser.rufname', 'type'=>'string',
                                 'len'=>'1:25:100', 'default'=>'', 'notnull'=>true ],
                'zusatz'    => [ 'anzeige'=>'Zusatz', 'source'=>'puser.zusatz', 'type'=>'combo',  'list'=>'combolisten.zusatz',
                                 'len'=>'1:25:100', 'default'=>'', 'notnull'=>true ],
                'email'     => [ 'anzeige'=>'Email', 'source'=>'puser.email', 'type'=>'string',
                                 'len'=>'1:25:100', 'default'=>'', 'notnull'=>true ],
                'www'       => [ 'anzeige'=>'www', 'source'=>'puser.www', 'type'=>'string',
                                 'len'=>'1:25:100', 'default'=>'', 'notnull'=>true ],
                'anschrift' => [ 'anzeige'=>'Anschrift', 'source'=>'puser.anschrift', 'type'=>'string',
                                 'len'=>'1:25:100', 'default'=>'', 'notnull'=>true ],
                'geb'       => [ 'anzeige'=>'Geb', 'source'=>'puser.geb', 'type'=>'date',
                                 'len'=>'1:25:100', 'default'=>'', 'notnull'=>true ],
                'landsmann' => [ 'anzeige'=>'Landsmann', 'source'=>'puser.landsmann', 'type'=>'string',
                                 'len'=>'1:25:100', 'default'=>'', 'notnull'=>true ],
                'telefon' => [ 'anzeige'=>'telefon', 'source'=>'puser.telefon', 'type'=>'string',
                                    'len'=>'1:25:100', 'default'=>'', 'notnull'=>true ],
                'gehalt'     => [ 'anzeige'=>'Gehalt', 'source'=>'puser.gehalt', 'type'=>'number',
                                  'len'=>'1:25:100', 'default'=>'', 'notnull'=>true ],
                'startdate'  => [ 'anzeige'=>'Startdate', 'source'=>'puser.startdate', 'type'=>'date',
                                  'len'=>'1:25:100', 'default'=>'', 'notnull'=>true ],
                'aufgabe'    => [ 'anzeige'=>'Aufgabe', 'source'=>'puser.aufgabe', 'type'=>'combo', 'list'=>['Reitbeteiligung', 'Eigentümer', 'Pferdebesitzer', 'Ausbilder Pferd', ],
                                  'len'=>'1:25:100', 'default'=>'', 'notnull'=>true ],
                'beruf'    => [ 'anzeige'=>'beruf', 'source'=>'puser.beruf', 'type'=>'combo', 'list'=>['Einsteller', 'Tierarzt', 'Osteopath', 'Schmied', 'Einsteller', 'Einsteller', 'Einsteller', 'Einsteller', 'Einsteller',],
                                  'len'=>'1:25:100', 'default'=>'', 'notnull'=>true ],
                'bemerkung'  => [ 'anzeige'=>'Bemerkung', 'source'=>'puser.bemerkung', 'type'=>'string',
                                  'len'=>'1:25:100', 'default'=>'', 'notnull'=>true ],
                'active' => [
                    'active' => [ 'anzeige'=>'active', 'source'=>'puser.bemerkung', 'type'=>'checkbox',
                                  'len'=>'1:25:100', 'default'=>'1', 'notnull'=>true ],
                    'startdate' => [ 'anzeige'=>'startdate', 'source'=>'puser.bemerkung', 'type'=>'date',
                                     'len'=>'1:25:100', 'default'=>Carbon::now()->toDateTimeString(), 'notnull'=>true ],
                ],
                'updated_at' => Carbon::now()->toDateTimeString(),
                'created_at' => Carbon::now()->toDateTimeString(),
            ],

            [ 'itype' => 'screen',
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
                'anschrift' => 'Beverstr. 12, 58553 Halver, NW, Deuschland',
                'geb' => date("Y-m-d", strtotime('19590102')),
                'landsmann' => 'deutsch',
                'telefon' => [
                    [ "Privat" => "02353 6699940" ],
                    [ "Geschäft" => "02353 7096271" ],
                    [ "Mobil" => "0174 2170044" ],
                    [ "Auto"  =>  $this->__xdata('telefon') ],
                ],
                'gehalt' => 65000,
                'startdate' => Carbon::create(2020, 11,12),
                'aufgabe' => 'Reitbeteiligung',
                'beruf' => '',
                'bemerkung' => 'keine',
                'active' => [
                    'active' => true,
                    'startdate' => Carbon::now()->toDateTimeString(),
                ],
                'updated_at' => Carbon::now()->toDateTimeString(),
                'created_at' => Carbon::now()->toDateTimeString(),
            ],
            [ 'itype' => 'data',
                'anrede' => 'Frau',
                'vorname' => 'Petra',
                'nachname' => 'Kruggel',
                'title' => '',
                'rufname' => '',
                'zusatz' => '',
                'email' => Str::random(10) . '@gmail.com',
                'www' => 'www.' . Str::random(5) . '.com',
                'anschrift' => 'Beverstr. 12, 58553 Halver',
                'geb' => Carbon::create(1954, 2,3),
                'landsmann' => 'deutsch',
                'telefon' => [
                    [ "Privat" => "02353 6699940" ],
                    [ "Mobil" => "0174 2170044" ],
                    [ "Auto"  =>  $this->__xdata('telefon') ],
                ],
                'gehalt' => 65000, 'startdate' => Carbon::create(2020, 11,12),
                'aufgabe' => 'Zuschauer',
                'beruf' => '',
                'bemerkung' => 'keine',
                'active' => [
                    'active' => true,
                    'startdate' => Carbon::now()->toDateTimeString(),
                ],
                'updated_at' => Carbon::now()->toDateTimeString(),
                'created_at' => Carbon::now()->toDateTimeString(),
            ],
            [ 'itype' => 'data',
                'anrede' => 'Herr',
                'title' => '',
                'vorname' => 'Thomas',
                'nachname' => 'Mista',
                'rufname' => 'Tom',
                'zusatz' => 'Pferdezüchter',
                'email' => Str::random(10) . '@gmail.com',
                'www' => 'www.' . Str::random(5) . '.com',
                'anschrift' => 'Hauptstr. 10, 58511 Lüdenscheid',
                'geb' => Carbon::create(1985, 7,24),
                'landsmann' => 'deutsch',
                'telefon' => [
                    [ "Privat" => "069 521411" ],
                    [ "Mobil" => "0177 63225142" ],
                    [ "Mobil" => "0177 422541225" ],
                    [ "Auto"  =>  $this->__xdata('telefon') ],
                ],
                'aufgabe' => 'Pferd',
                'beruf' => '',
                'bemerkung' => 'dummy adresse',
                'active' => [
                    'active' => true,
                    'startdate' => Carbon::now()->toDateTimeString(),
                ],
                'updated_at' => Carbon::now()->toDateTimeString(),
                'created_at' => Carbon::now()->toDateTimeString(),
            ],
            [ 'itype' => 'data',
                'anrede' => 'Herr',
                'title' => '',
                'vorname' => 'Trima',
                'nachname' => 'Sida',
                'rufname' => '',
                'zusatz' => 'Pferdezüchter',
                'email' => Str::random(10) . '@gmail.com',
                'www' => 'www.' . Str::random(5) . '.com',
                'anschrift' => 'Hauptstr. 12, 58511 Lüdenscheid',
                'geb' => Carbon::create(1985, 7,24),
                'landsmann' => 'deutsch',
                'telefon' => [
                    [ 'Handy' => $this->__xdata('telefon') ],
                ],
                'aufgabe' => 'Pferd, Trainer',
                'beruf' => '',
                'bemerkung' => 'dummy adresse',
                'active' => [
                    'active' => true,
                    'startdate' => Carbon::now()->toDateTimeString(),
                ],
                'updated_at' => Carbon::now()->toDateTimeString(),
                'created_at' => Carbon::now()->toDateTimeString(),
            ],
            [ 'itype' => 'data',
                'anrede' => 'Frau',
                'title' => '',
                'vorname' => 'Svenja',
                'nachname' => 'Sanders',
                'rufname' => '',
                'zusatz' => '',
                'email' => Str::random(10) . '@gmail.com',
                'www' => 'www.' . Str::random(5) . '.com',
                'anschrift' => '',
                'geb' => Carbon::create(1985, 7,24),
                'landsmann' => 'deutsch',
                'telefon' => [
                    [ 'Handy' => $this->__xdata('telefon') ],
                ],
                'aufgabe' => $this->__xdata('aufgabe'),
                'beruf' => '',
                'bemerkung' => 'keine Bemerkung',
                'active' => [
                    'active' => true,
                    'startdate' => Carbon::now()->toDateTimeString(),
                ],
                'updated_at' => Carbon::now()->toDateTimeString(),
                'created_at' => Carbon::now()->toDateTimeString(),
            ],
            [ 'itype' => 'data',
                'anrede' => 'Frau',
                'title' => '',
                'vorname' => 'Claudia Anne',
                'nachname' => 'Ludovici',
                'rufname' => 'Claudia',
                'zusatz' => 'Stallbetreiberin',
                'email' => Str::random(10) . '@gmail.com',
                'www' => 'www.' . Str::random(5) . '.com',
                'anschrift' => 'Grüne 1, Breckerfeld',
                'geb' => Carbon::create(1985, 4,30),
                'landsmann' => 'deutsch',
                'telefon' => [
                    [ 'Handy' => $this->__xdata('telefon') ],
                ],
                'aufgabe' => 'Pferd',
                'beruf' => '',
                'bemerkung' => 'keine Bemerkung',
                'active' => [
                    'active' => true,
                    'startdate' => Carbon::now()->toDateTimeString(),
                ],
                'updated_at' => Carbon::now()->toDateTimeString(),
                'created_at' => Carbon::now()->toDateTimeString(),
            ],
            [ 'itype' => 'data',
                'anrede' => 'Herr',
                'title' => '',
                'vorname' => 'Arno',
                'nachname' => 'Kefenbaum',
                'rufname' => '',
                'zusatz' => '',
                'email' => Str::random(10) . '@gmail.com',
                'www' => 'www.' . Str::random(5) . '.com',
                'anschrift' => 'Grüne 1, Breckerfeld',
                'geb' => Carbon::create(1985, 4,30),
                'landsmann' => 'deutsch',
                'telefon' => [
                    [ 'Handy' => $this->__xdata('telefon') ],
                ],
                'aufgabe' => $this->__xdata('aufgabe'),
                'beruf' => '',
                'bemerkung' => 'keine Bemerkung',
                'active' => [
                    'active' => true,
                    'startdate' => Carbon::now()->toDateTimeString(),
                ],
                'updated_at' => Carbon::now()->toDateTimeString(),
                'created_at' => Carbon::now()->toDateTimeString(),
            ],
            [ 'itype' => 'data',
                'anrede' => 'Firma',
                'title' => '',
                'vorname' => '',
                'nachname' => 'Stall Claudia',
                'rufname' => '',
                'zusatz' => 'Pferdestall und Boxenvermietung',
                'email' => Str::random(10) . '@gmail.com',
                'www' => 'www.' . Str::random(5) . '.com',
                'anschrift' => 'Grüne 1, Breckerfeld',
                'geb' => Carbon::create(1985, 4,30),
                'landsmann' => 'deutsch',
                'telefon' => [
                    [ 'Handy' => $this->__xdata('telefon') ],
                ],
                'aufgabe' => '',
                'beruf' => '',
                'bemerkung' => 'keine Bemerkung',
                'active' => [
                    'active' => true,
                    'startdate' => Carbon::now()->toDateTimeString(),
                ],
                'updated_at' => Carbon::now()->toDateTimeString(),
                'created_at' => Carbon::now()->toDateTimeString(),
            ],
            [ 'itype' => 'data',
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
                'telefon' => [
                    [ 'Handy' => $this->__xdata('telefon') ],
                ],
                'aufgabe' => 'Pferd, Trainer',
                'beruf' => '',
                'bemerkung' => 'keine Bemerkung',
                'active' => [
                    'active' => true,
                    'startdate' => Carbon::now()->toDateTimeString(),
                ],
                'updated_at' => Carbon::now()->toDateTimeString(),
                'created_at' => Carbon::now()->toDateTimeString(),
            ],
            [ 'itype' => 'data',
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
                'telefon' => [
                    [ 'Handy' => $this->__xdata('telefon') ],
                ],
                'aufgabe' => $this->__xdata('aufgabe'),
                'beruf' => '',
                'bemerkung' => 'keine Bemerkung',
                'active' => [
                    'active' => true,
                    'startdate' => Carbon::now()->toDateTimeString(),
                ],
                'updated_at' => Carbon::now()->toDateTimeString(),
                'created_at' => Carbon::now()->toDateTimeString(),
            ]]);

            for ($i = 0; $i < 15; $i++) {
                $an = $this->__xdata('vorname');              // => "Herr,Roland"
                $co = random_int(0, 2) + 1;

                DB::connection('mongodb')->collection('pusers')->insert([
                    'itype' => 'data',
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
                    'telefon' => [
                        [ 'Handy' => $this->__xdata('telefon') ],
                    ],
                    'aufgabe' => $this->__xdata('aufgabe'),
                    'beruf' => '',
                    'bemerkung' => file_get_contents('http://loripsum.net/api/1/medium/plaintext'),
                    'active' => [
                        'active' => true,
                        'startdate' => Carbon::now()->toDateTimeString(),
                    ],
                    'updated_at' => Carbon::now()->toDateTimeString(),
                    'created_at' => Carbon::now()->toDateTimeString(),
                ]);
            }   // ende for

    }
}
