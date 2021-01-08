<?php
/*
 * Projekt  Larahorse
 * ----------------------------------------------------
 *
 * Copyright (c) 2020-2021,  Roland Kruggel
 * All Rights Reserved.
 * License: MIT
 *
 * @author		Roland Kruggel, rkruggel@bbf7.de
 * @file		PuserMain.php
 * @path		/home/roland/Develop/Larahorse/app/Http/Livewire/PuserMain.php
 * @lastChange	06.01.21, 15:57 by roland
 *
 */

/*
 * Aus: Url: https://ohseemedia.com/posts/building-a-search-drop-down-component-with-laravel-livewire/
 */

namespace App\Http\Livewire;

use App\Library\Helpers;
use App\Library\JsonDbDaten;
use App\Models\pusers;
use Database\Seeders\PusersSeeder;
use Illuminate\Database\Seeder;
use Livewire\Component;

class PuserMain extends Component
{


    /* wird als Variable übergeben. */
    public string $post;

    /** @var string $query */
    public string $query;

    /** @var array $contacts */
    public array $contacts;

    /** @var pusers $selectvar */
    public pusers $selectvar;

    /** @var int $highlightIndex */
    public int $highlightIndex;

    public array $telefons = [];

    public $updatemode = false;


    public pusers $screen_puser;
    public array $screen_config;


    //protected $listeners = [ 'showDetails' => 'showDetails' ];

    //** privats */

    public function wndScreenShow($id)
    {
        $screen_puser = pusers::find($id);
        $screen_config = JsonDbDaten::getConfig('pusers');


//        $this->telefons = $puser->jtelefon;
        $a=0;
    }
    /**
     * Event:
     * Button Cancel im scr-Screen
     */
    public function scrcancel()
    {
        $this->updateMode = false;
//        $this->resetInputFields();
    }

    /**
     * Event:
     * Button Update im scr-Screen
     *
     * @param null $para
     */
    public function scrupdate($para = null)
    {
        $aii = $this->telefons;
        $id = $this->selectvar->id;
        $a = 0;
    }



    /***************************************************
     *
     * Das wird gebraucht für den
     *
     *          Telefon Screen
     *
     ***************************************************/


    /**
     * Event:
     * Button Cancel im Telefon-Screen
     */
    public function cancel()
    {
        $this->updateMode = false;
//        $this->resetInputFields();
    }

    /**
     * Event:
     * Button Update im Telefon-Screen
     *
     * @param null $para
     */
    public function update($para = null)
    {
        $aii = $this->telefons;
        $id = $this->selectvar->id;
        $a = 0;
    }


    /**
     * @param $id
     */
    public function wndTelefonShow($id)
    {
        $puser = pusers::where('id', $id)->first();
        $this->telefons = $puser->jtelefon;
    }



    /***************************************************
     *
     * Das wird gebraucht für den
     *
     *          Detail Screen
     *
     ***************************************************/


    public function tgg()
    {
        $inta = (array)$this->selectvar->jtelefon;
        return $this->tgf($inta);
    }

//    public function tff()
//    {
//        $inta = (array)$this->selectvar->jfield;
//        return $this->tgf($inta);
//    }

    private function tgf($inta)
    {
        $retvar = 'anz: ';

        if (!empty($inta)) {
            $intvar = sizeof($inta);
        } else {
            $intvar = '---';
        }
        return $retvar . $intvar;
    }


    /**
     * @param string $key
     * @param mixed $param
     * @return mixed
     */
    public function getJfieldData_Value(string $key, array $param) {
        $a=0;
        return $param['value'];
    }

    /**
     * @param string $key
     * @param mixed $param
     * @return string
     */
    public function getJfieldData_Anzeige(string $key, array $param)
    {
        $config = JsonDbDaten::getConfig('pusers');
        $anz = $config[$key]['anzeige'];
        $a=0;

        return $anz;
    }


    /**
     * Event:
     * Wenn die ID in der linken Seite (Auflistung) angeklickt wird, wird
     * diese Funktion aufgerufen und erzeugt die rechte Seite mit den Details.
     *
     * @ param int $id
     * @param string $id
     */
    public function showDetails(string $id)
    {
        //dd($id);
        $_puser = pusers::find(json_decode($id));
        $this->selectvar = $_puser;

        $a=0;
    }



    /***************************************************
     *
     * Das wird gebraucht für den
     *
     *          Main Screen
     *
     ***************************************************/

    /**
     * Event:
     * Wenn in input-field eine Eingabe gemacht wurde.
     *
     * Automatisches update der Klassenvariable $this->contacts.
     */
    public function updatedQuery()
    {
        $this->contacts = pusers::where('nachname', 'like', '%' . $this->query . '%')
            ->orderBy('nachname')
            ->orderBy('vorname')
            ->get()
            ->toArray();

        //$aa = $this->listeners;
        $a = 0;
    }


    /**
     * So was wie ein Constructor
     */
    public function mount()
    {
        /* test */
//        $tt0 = PusersSeeder::__getjson_daten();   //__xjsonstring_daten();
//        $tt0P  = gettype($tt0);
//
//        $tt1 = PusersSeeder::__getjson_daten();   //__xjsonstring_daten();
//        $tt0P  = gettype($tt1);
//
//
//        $zzz = PusersSeeder::__xjsondata(
//            ['landsmann' => 'deutsch', 'gehalt' => 65000, 'anrede' => 'Herr', 'titel' => 'TITEL1', 'startdate' => '12.11.2020', 'bem' => 'keine Bemerkung' ]
//        );
//        $zzzP  = gettype($zzz);
//
//
//        $a=0;
//
//        $rr = JsonDbDaten::getConfig('pusers');

        // hier geht es weiter

        $this->reset();
    }

    /**
     * Ein Reset alle variablen
     *
     * @param mixed ...$properties
     */
    public function reset(...$properties)
    {
        $this->query = 'a';
        $this->contacts = [];
        $this->highlightIndex = 0;

        //todo: das geht nicht. bitte reparieren
//        $this->selectvar = Pusers::find(PHP_INT_MAX);
    }

//    public function incrementHighlight()
//    {
//        if ($this->highlightIndex === count($this->contacts) - 1) {
//            $this->highlightIndex = 0;
//            return;
//        }
//        $this->highlightIndex++;
//    }
//
//    public function decrementHighlight()
//    {
//        if ($this->highlightIndex === 0) {
//            $this->highlightIndex = count($this->contacts) - 1;
//            return;
//        }
//        $this->highlightIndex--;
//    }
//
//    public function selectContact()
//    {
//        $contact = $this->contacts[$this->highlightIndex] ?? null;
//        if ($contact) {
//            $this->redirect(route('show-contact', $contact['id']));
//        }
//    }



    /**
     * Rendert den blade.php
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function render()
    {
        return view('livewire.puser-main');
    }
}
