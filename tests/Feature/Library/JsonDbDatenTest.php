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
 * @file		JsonDbDatenTest.php
 * @path		/home/roland/Develop/Larahorse/tests/Feature/Library/JsonDbDatenTest.php
 * @lastChange	22.11.20, 11:04 by roland
 */

namespace Tests\Library;

use App\Library\JsonDbDaten;
use PHPUnit\Framework\TestCase;

class JsonDbDatenTest extends TestCase
{

    // warscheinlich tot //
    public function testGetJfield()
    {
        $this->assertTrue(true);
    }

    public function test__getMetaConfig_Puser()
    {
        $va = JsonDbDaten::__getMetaConfig_Puser('pusers');
        $a=0;
    }
    public function testGetMeta()
    {
        $va = JsonDbDaten::getMeta('pusers');
        $this->assertTrue(true);
    }

    public function testGetConfig()
    {
        $va = JsonDbDaten::getConfig('pusers');
        $this->assertTrue(true);
    }
}
