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
 * @file		HtmlHelpers.php
 * @path		/home/roland/Develop/Larahorse/app/Library/HtmlHelpers.php
 * @lastChange	16.01.21, 16:03 by roland
 *
 */

namespace App\Library;


use Exception;

class HtmlHelpers
{

    public static function formatError(Exception $ex, $txt = '--'): string
    {
        $m1 = $ex->getMessage();
        $m2 = $ex->getFile();
        $m3 = $ex->getLine();
        $at = <<<EOF

<style>
    .tbt55 {
        font-family: Menlo, Monaco, Consolas, Liberation Mono, Courier New, monospace;
        margin: 3em;
    }

    .tbt55 h2 {
        margin-left: 30px;
    }
    .tbt55 table {
        margin-left: 30px;
    }
    .tbt55 td {
        padding-right: 10px;
    }
    .tbt55 p {
        background-color: orangered;
        padding: 10px;
    }
</style>

<div class="tbt55">
    <h2>Error Larahorse</h2>
    <p>$txt</p>
    <table>
        <tr>
            <td>error</td>
            <td>$m1</td>
        </tr>
        <tr>
            <td>file</td>
            <td>$m2</td>
        </tr>
        <tr>
            <td>line</td>
            <td>$m3</td>
        </tr>
    </table>
    <p>Das Programm wurde mit <i>die()</i> abgebrochen</p>
</div>
EOF;

        return $at;
    }
}
