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
 * @file		YamlDataLib.php
 * @path		/home/roland/Develop/Larahorse/app/Library/YamlDataLib.php
 * @lastChange	17.01.21, 13:04 by roland
 *
 */

namespace App\Library;


class YamlDataLib
{

    /**
     * Das gibt es zweimal. Sollte in eine Lib ausgelagert werden
     * -> YamlDataInit
     *
     * @call yamlDirEntrys
     *
     * @param $path
     * @return string
     */
    public static function addSlashToPath($path): string
    {
        $path = trim($path);
        if (substr($path, -1) != '/') $path .= DIRECTORY_SEPARATOR;

        return $path;
    }
}
