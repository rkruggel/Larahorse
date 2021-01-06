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


use SplFileInfo;
use Symfony\Component\Yaml\Yaml;
use function PHPUnit\Framework\stringContains;


/**
 * Class yamlData
 * @package App\Library
 * @see https://symfony.com/doc/current/components/yaml.html
 */
class yamlData
{
    private static string $pfad = '../app/Siteconfig/';

    /**
     * Wenn notwendig wird die Extension '.yaml' hinzu gefügt
     *
     * @param string $yamlfile
     * @return string
     */
    private static function sepExtension(string $yamlfile)
    {
        $info = new SplFileInfo($yamlfile);
        $basename = $info->getBasename('.yaml');
        return $basename . '.yaml';
    }

    /**
     * Liest ein yaml-File und gibt ein PHP-Array zurück
     *
     * @param string $yamlfile
     * @return array|null
     */
    public static function Read(string $yamlfile): ?array
    {
        /** @var array $ret */
        $ret = null;

        $file = self::$pfad . self::sepExtension($yamlfile);
        if(file_exists($file)) {
            $data = file_get_contents($file);
            $ret = Yaml::parse($data);
        }
        return $ret;
    }

    public static function ReadText(string $yamlfile): ?string
    {
        /** @var string $ret */
        $ret = null;

        $file = self::$pfad . self::sepExtension($yamlfile);
        if(file_exists($file)) {
            $ret = file_get_contents($file);
        }
        return $ret;
    }

    /**
     * Schreibt den yaml-File als Text
     *
     * @param string $yamlfile
     * @param string $text
     * @return false|int
     */
    public static function WriteText(string $yamlfile, string $text)
    {
        $file = self::$pfad . self::sepExtension($yamlfile);
        $rgg = file_put_contents($file, $text);

        return $rgg;
    }

}
