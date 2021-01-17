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
     * Die Collection der DB für die Yaml-Daten
     */
    private YamlDataLib $yamlDataLib;

    public siteconfig $sitecfg;


    public function __construct(string $configname)
    {
        $this->SITE_CONFIG_PFAD = env('IS_UNIT_TEST') ? 'app/Siteconfig/Tests' : '../app/Siteconfig/';
        $this->yamlDataLib = new YamlDataLib();

        $this->sitecfg = siteconfig::where('key', $configname)->first();

        if (!$this->sitecfg) {
            throw new Exception("Class YamlData: '$configname' wurde nicht gefunden",);
        }

    }

    public function dataToString()
    {
        return $this->sitecfg->data;
    }

    public function dataToArray()
    {
        $ary = Yaml::parse($this->sitecfg->data);
        return $ary;
    }

//    /**
//     * Liest ein yaml-File und gibt ein PHP-Array zurück
//     *
//     * @param string $yamlfile
//     * @param string $itemKey
//     * @return array
//     * @throws Exception
//     */
//    public function readYamlDbToArray(string $yamlfile, string $itemKey = 'all'): array
//    {
//        $yamlData = new YamlData();
//        $yamlstring = $yamlData->readYamlDbToText($yamlfile);
//        $yamlarray = Yaml::parse($yamlstring);
//
//        return $yamlarray;
//    }
//

//    /**
//     * liest Daten aus der Yaml-DB als Text
//     *
//     * @param string $configname
//     * @return string
//     * @throws Exception
//     */
//    public function readYamlDbToText(string $configname): string
//    {
//        $sconfig = siteconfig::where('key', $configname)->first();
//
//        if(!$sconfig) {
//            throw new Exception( "Der yaml '$configname' wurde nicht gefunden", );
//        }
//
//        return $sconfig->data;
//    }

    /**
     * updated Text Daten in der Yaml-DB
     *
     * @param siteconfig $sconfig
     * @return bool
     */
    public function updateYamlDb(siteconfig $sconfig): bool
    {
//        $erg = $sconfig->save();
        return $erg;
    }

}


