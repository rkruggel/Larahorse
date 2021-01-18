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
 * @file		yamlData.php
 * @path		/home/roland/Develop/Larahorse/app/Library/yamlData.php
 * @lastChange	06.01.21, 15:53 by roland
 *
 */

namespace App\Library;


use App\Models\siteconfig;
use Exception;
use phpDocumentor\Reflection\Types\Mixed_;
use PHPUnit\TextUI\XmlConfiguration\Logging\TestDox\Html;
use SplFileInfo;
use Symfony\Component\Console\Tester\ApplicationTester;
use Symfony\Component\Yaml\Yaml;
use App\Library\HtmlHelpers;

//error_reporting( E_ALL );
//
//function handleError($errno, $errstr,$error_file,$error_line)
//{
//    echo "<b>Error:</b> [$errno] $errstr - $error_file:$error_line";
//    echo "<br />";
//    echo "Terminating PHP Script";
//
//    die();
//}
//
//// set error handler
//set_error_handler('handleError');


/**
 * Class YamlData
 *
 * Die Klasse enthält alle Funktionen zum lesen/schreiben und
 * behandeln der Yaml-Files und der Datenbanktabellen für die
 * Yaml Daten.
 *
 * @package App\Library
 * @see https://symfony.com/doc/current/components/yaml.html
 */
class YamlData
{
    /**
     * Das Verzeichniss der Yaml-Files
     */
    private string $SITE_CONFIG_PFAD;

    /**
     * Die Instanz des Model
     *
     * @var siteconfig
     */
    public siteconfig $sitecfg;


    /**
     * YamlData constructor.
     *
     * @param string $configname
     * @throws Exception
     */
    public function __construct(string $configname)
    {
        $this->SITE_CONFIG_PFAD = env('IS_UNIT_TEST') ? 'app/Siteconfig/Tests' : '../app/Siteconfig/';

        $this->sitecfg = siteconfig::where('key', $configname)->first();

        if (!$this->sitecfg) {
            throw new Exception("Class YamlData: '$configname' wurde nicht gefunden",);
        }

    }

    /**
     * Das Data-Feld als String. Das ist das original.
     *
     * @return string|null
     */
    public function dataToString(): ?string
    {
        return $this->sitecfg->data;
    }

    /**
     * Das Data-Feld als Array. Umgewandelt mit Yaml::parse
     *
     * @return array
     */
    public function dataToArray(): array
    {
        return Yaml::parse($this->dataToString());
    }

    /**
     * updated Text Daten in der Yaml-DB
     *
     * @param string $value
     * @return bool
     */
    public function updateYamlDb(string $value): bool
    {
        if ($this->sitecfg->data != $value) {
            $this->sitecfg->data = $value;
            return $this->sitecfg->save();
        }

        return true;
    }

}


