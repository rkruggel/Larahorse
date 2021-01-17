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
 * @file		ProgEdit.php
 * @path		/home/roland/Develop/Larahorse/app/Http/Livewire/Progs/ProgEdit.php
 * @lastChange	08.01.21, 17:43 by roland
 *
 */

namespace App\Http\Livewire\Progs;

use App\Library\YamlData;
use App\Models\siteconfig;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Livewire\Component;

class ProgEdit extends Component
{
    /**
     * @var string
     */
//    public ?string $yamltext = '';
    public siteconfig $yamltext;
    public string $yamlback = '';

    public bool $isfiletype = false;
    public ?string $yamlfilename = '';


    public function mount($yamltype, $yamlname)
    {
        if ($yamltype === 'file') {
            $this->isfiletype = true;
            $this->yamlfilename = $yamlname;
//            $_SESSION['lara']['yamlfilename'] = $yamlname;
        }

        if ($yamltype === 'wire') {
            // TODO: hier der aufruf einer wire:xxx
        }

        $this->editorLoad($this->yamlfilename);
    }


    /**
     * Wird aus dem Javascript aufgerufen. Die Daten können als parameter
     * mitgegeben werden oder es wird eine globale Variable gesetzt.
     *
     * @param $value 'Die geänderen Editordaten'
     */
    public function editorSave($value)
    {
//        $ra = $this->yamltext;
//        $rb = $this->yamlback;
//
//        $ast_org = strlen($this->yamltext);
//        $ast_neu = strlen($this->yamlback);

//        $this->editorWrite('main', trim($value));
//        $this->yamlfilename = $_SESSION['lara']['yamlfilename'];

        if ($this->yamltext->data != $value) {
            $this->yamltext->data = $value;
            YamlData::updateYamlDb($this->yamltext);
        }

        $this->redirect('/');
    }


    /**
     * Yaml laden
     *
     * @param string $name
     */
    public function editorLoad(string $name)
    {
        $this->yamltext = YamlData::   readYamlDbToText($name); //    ReadText($name);
    }

    /**
     * Yaml speichern
     *
     * @param string|null $name
     * @param string $value
     */
    public function editorWrite(?string $name, string $value)
    {
//        YamlData::WriteText($name, $value);
        YamlData::updateYamlDb();
    }


    public function render()
    {
        return view('livewire.progs.prog-edit');
    }
}
