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
 * @file		SelectProg.php
 * @path		/home/roland/Develop/Larahorse/app/Http/Livewire/Start/SelectProg.php
 * @lastChange	08.01.21, 18:59 by roland
 *
 */

namespace App\Http\Livewire\Start;


use App\Models\pusers;
use App\Models\progs;
use App\Library\YamlData;
use Illuminate\Database\Eloquent\Collection;
use DateTime;
use Illuminate\Support\Facades\Config;
use Livewire\Component;
use MongoDB\BSON\ObjectId;
use MongoDB\Driver\Session;
use PhpParser\Node\Expr\Array_;
use Symfony\Component\Yaml\Yaml;


class SelectProg extends Component
{
    /**
     * Überschrift über dem sidamenu
     * @var string
     */
    public string $brand;
    /**
     * @var array
     */
    public array $proglists;
    /**
     * @var \MongoDB\BSON\ObjectId
     */
    public ObjectId $progid;
    /**
     * Der Programmname der angeklickt wurde
     *
     * @var string
     */
    public string $progname = "";



    private function test()
    {
        // $users = User::whereRaw('age > ? and votes = 100', [25])->get();
        $tza = progs::all();
        $tzb = progs::where('itype', 'data')->get();
        $tzc = progs::where('itype', 'screen')->get();
        $tzd = progs::where([
            ['itype', '=', 'data'],
            ['active', '=', true]
        ])
            ->orderBy('name', 'asc')
            ->get();
        $tze = progs::where('itype', '=', 'data')
            ->where('active', '=', true)
            ->orderBy('name', 'asc')
            ->get();

        $tcounta = $tza->count();       // 7
        $tcountb = $tzb->count();       // 6
        $tcountc = $tzc->count();       // 1
        $tcountd = $tzd->count();       // 4
        $tcounte = $tze->count();       // 4



        $pilz = progs::where('name', 'Pilze')->first();
        if(!$pilz) {
            $tg = Date('Y-m-d', mktime(0, 0, 0, 1, 2, 2020));
            $tzf = new progs();
            $tzf['type'] = 'data';
            $tzf['name'] = 'Pilze';
            $tzf['date'] = $tg;
            $tzf['active'] = false;
            $tzf['user'] = 'diana';
            $tzf['desc'] = 'keine Bemerkung';
            $tzf->save();
        }


        $rt = progs::where('name', 'ich')->first();
        $rt->active = false;
        $rt->save();

        $a=0;
    }


    /**
     * @param $id
     */
    public function wndProgShow()   //$id)
    {
        $a=0;
    }






    public function add()
    {
        $a=0;
    }

    public function delete()
    {
        $a=0;
    }

    public function edit()
    {
        $a=0;
    }

    public function editall()
    {
        $a = 0;
    }

    public function clear()
    {
        $this->progname = "";
    }


    /**
     * Wenn ein menüpunkt auf der linken Seite geklicked wurde.
     * Der Wert wird hier gespeichert.
     *
     * @param string $value
     */
    public function saveProg(string $value)
    {
        // den prognamen setzen
        $this->progname = $value;

        // den wert der Prog auswahl in eine Sessionvariable speichern
        $_SESSION['lara']['progname'] = $value;

        // fürt ein event aus
        // der listener ist in ProgEdit.php
        $this->emit('saveProgEmit', $value);

        $a = 0;
    }


    /**
     * Hier geht es los
     */
    public function mount()
    {
        // -- yaml daten lesen
        $ydMain = new YamlData('main');
        $yamlarray = $ydMain->dataToArray();

        // -- Menuüberschrift
        $this->brand = $yamlarray['page']['sidemenu']['brand'];

        // -- Programmliste
        $this->proglists = $yamlarray['page']['sidemenu']['menu'];
        $rtg = ksort($this->proglists);

        // --

    }

    /**
     * @return \MongoDB\BSON\ObjectId
     */
    private function zsakah()
    {
        return $this->proglists->_id;
    }

    public function update($ii=null, $q=null, $a=null)
    {
        $a=0;
    }


    public function render()
    {
        return view('livewire.start.select-prog');
    }
}
