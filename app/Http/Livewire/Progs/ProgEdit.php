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
use Exception;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Livewire\Component;
use Symfony\Component\Yaml\Yaml;

class ProgEdit extends Component
{
    /**
     * @var string
     */
    public ?string $yamltext = '';
    /**
     * @var siteconfig|mixed
     */
    public $siteconfig;
    /**
     * @var YamlData|mixed
     */
    protected $yamlData;


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
     * @throws \Exception
     */
    public function editorSave($value)
    {
        // Testen ob die Yaml valide ist
        try {
            $aa = Yaml::parse($value);
        } catch (Exception $e) {
            session()->flash('message', "Yaml not valide: " . $e->getMessage());
            return;
        }

        $this->yamlData = new YamlData($this->yamlfilename);
        $this->yamlData->updateYamlDb($value);

        $this->redirect('/');
    }

    /**
     * Yaml laden
     *
     * @param string $name
     * @throws \Exception
     */
    public function editorLoad(string $name)
    {
        $this->yamlData = new YamlData($name);
        $this->siteconfig = $this->yamlData->sitecfg;
        $this->yamltext = $this->yamlData->dataToString();
    }


    public function render()
    {
        return view('livewire.progs.prog-edit');
    }
}
