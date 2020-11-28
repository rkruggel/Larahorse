<?php
/*
 * Projekt  Larahorse
 * ----------------------------------------------------
 *
 * Copyright (c) 2020-2020,  Roland Kruggel
 * All Rights Reserved.
 * License: MIT
 *
 * @author		Roland Kruggel, rkruggel@bbf7.de
 * @file		Helpers.php
 * @path		/home/roland/Develop/Larahorse/app/Library/Helpers.php
 * @lastChange	20.11.20, 10:19 by roland
 */

namespace App\Library;



/**
 * Class Helpers
 * Hilfe-Routinen. Können von Überall aufgerufen werde. Sie sind static.
 *
 * @package App\Library
 */
class Helpers
{
    /**
     * Convert: String to Json
     *
     * @param string $param
     * @param bool $assoc
     * @return array
     */
    public static function string2json(string $param, bool $assoc = true)
    {
        return json_decode($param, $assoc);
    }

    /**
     * Convert: Json to String
     *
     * @param array $param
     * @return string
     */
    public static function json2string(array $param)
    {
        return json_encode($param);
    }

    /**
     * Convert: stdClass to Array
     *
     * Wenn ein Array aus einer stdClass besteht kann es hiermit in ein
     *  echtes Array convertiert werden.
     *
     * @param string $param
     * @param bool $assoc
     * @return array
     */
    public static function stdClass2array(string $param, bool $assoc = true)
    {
        return json_decode(json_encode($param), $assoc);
    }

}
