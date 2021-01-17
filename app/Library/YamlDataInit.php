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
 * @file		YamlDataInit.php
 * @path		/home/roland/Develop/Larahorse/app/Library/YamlDataInit.php
 * @lastChange	16.01.21, 13:30 by roland
 *
 */

namespace App\Library;

use App\Models\siteconfig;
use Exception;
use PhpParser\Node\Stmt\TryCatch;
use SplFileInfo;
use Symfony\Component\Yaml\Yaml;

class YamlDataInit
{
    /**
     * Das Verzeichniss der Yaml-Files
     */
    private string $SITE_CONFIG_PFAD;


    public function __construct()
    {
        $this->SITE_CONFIG_PFAD = env('IS_UNIT_TEST') ? 'app/Siteconfig/Tests/' : '../app/Siteconfig/';
    }

    /**
     * ??
     * -- ok
     * Wenn notwendig wird die Extension '.yaml' hinzu gefügt
     *
     * @param string $yf
     * @return string
     */
    private function _sepExtension(string $yf): string
    {
        $info = new SplFileInfo($yf);
        $basename = $info->getBasename('.yaml');
        return $basename . '.yaml';
    }

    /**
     * ??
     * -- ok
     * Überprüft ob das Direktory und der File vorhanden sind
     *  und ob darauf schreibend zugegriffen werden kann.
     *
     * @param string $yamlfile
     * @return array    [ 'data', 'errflag', 'errtxt' ];
     */
    private function _isYamlFile(string $yamlfile): array
    {
        $file = $this->_sepExtension($yamlfile);
        $file = $this->SITE_CONFIG_PFAD . $file;

        $errFlag = false;
        $errTxt = '';

        $aa = getcwd();

        if (!is_dir($this->SITE_CONFIG_PFAD)) {
            $errTxt = 'Error: Dir nicht vorhanden';
            $errFlag = true;
        }
        if (!is_writable($this->SITE_CONFIG_PFAD)) {
            $errTxt = 'Error: Dir ist nicht beschreibbar';
            $errFlag = true;
        }
        if (is_file($file) and !is_writable($file)) {
            $errTxt = 'Error: Der File ist nicht vorhanden oder nicht beschreibbar';
            $errFlag = true;
        }

        return ['data' => $file, 'errflag' => $errFlag, 'errtxt' => $errTxt];
    }

    /**
     * ??
     * -- ok
     * Erzeugt den kompletten Filename mit Pfad. Es wird auch
     *  sichergestellt das die exension .yaml vorhanden ist
     *
     * @param string $yamlfile
     * @return array    [ 'data', 'errflag', 'errtxt' ];
     */
    private function _makeFile(string $yamlfile): array
    {
        $yamlfileok = $this->_isYamlFile($yamlfile);

        return $yamlfileok;
    }

    /**
     * ??
     * Liest die Texte aus dem Yaml-File
     *
     * @param string $yamlfile
     * @return string|null
     */
    private function readTextFromYamlfile(string $yamlfile): ?string
    {
        /** @var string $ret */
        $ret = null;

        //todo: die Fehler werden hier noch nicht ausgewertet
        $filearry = $this->_makeFile($yamlfile);     // => [ 'data', 'errflag', 'errtxt' ];

        if (!$filearry['errflag']) {
            $ret = file_get_contents($filearry['data']);
        }

        return $ret;
    }


    /**
     * gibt die Direktory Einträge in SITE_CONFIG_PFAD zurück
     * Die Rückgabe ist ohne Pfad und ohne extension
     *
     * @return array [3]        => [ "einsteller", "main", "system" ]
     */
    private function yamlDirEntrys(): array
    {
        $fromapth = YamlDataLib::addSlashToPath($this->SITE_CONFIG_PFAD);

        $glob_liste = glob($fromapth . "*.yaml");

        $pp = [];
        foreach ($glob_liste as $item) {
            $path_parts = pathinfo($item);
            array_push($pp, $path_parts['filename']);
        }

        return $pp;
    }


    /**
     * Init die YamlDb
     *
     * @call web.php; route init
     * @throws Exception
     */
    public function initYamlDb()
    {
        $aa = getcwd();

        $co = 0;

        // Eine liste der namen der Yaml-Dateien holen.
        // Es werden nur die Dateien zurückgegeben die auch
        // wirklich in die Db kopiert werden sollen.
        $direntries = $this->yamlDirEntrys();

        foreach ($direntries as $direntry) {
            // test welcher eintrag nicht vorhanden ist.
            // Er gibt den count = 0 wieder
            $sconf = siteconfig::where('key', $direntry)->count();

            if ($sconf == 0) {
                // counter
                $co += 1;

                // Exeptionhandling.
                // In der aufgerufenen Funktion (hier readTextFromYamlfile) erfolgt
                // kein Try-catch-Block. Dieses erfolgt hier. Der Fehler wird hier
                // hin transportiert.


                // liest die Daten aus dem Yaml-File
                try {
                    $tx = $this->readTextFromYamlfile($direntry);
                } catch (Exception $e) {
                    die(HtmlHelpers::formatError($e));
                }

                // parsen des Yaml-files. Das dient hier nur zur kontrolle ob der
                // Yaml-file Syntaktisch i.o. ist.
                try {
                    $td = Yaml::parse($tx);
                } catch (Exception $e) {
                    die(HtmlHelpers::formatError($e));
                }

                // daten speichern
                $scdata = new siteconfig();
                $scdata->key = $direntry;
                $scdata->data = $tx;
                $scdata->save();
            }
        }

        return $co;
    }

}
