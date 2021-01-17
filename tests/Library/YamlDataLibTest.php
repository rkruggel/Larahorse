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
 * @file		YamlDataLibTest.php
 * @path		/home/roland/Develop/Larahorse/tests/Library/YamlDataLibTest.php
 * @lastChange	17.01.21, 13:10 by roland
 *
 */

namespace Tests\Library;

use App\Library\YamlDataInit;
use App\Library\YamlDataLib;
use PHPUnit\Framework\TestCase;

class YamlDataLibTest extends TestCase
{

    public function testAddSlashToPath()
    {

        $result = YamlDataLib::addSlashToPath('/aa/bb');
        $this->assertEquals('/aa/bb/', $result);

        $result = YamlDataLib::addSlashToPath('/aa/bb/');
        $this->assertEquals('/aa/bb/', $result);

        $result = YamlDataLib::addSlashToPath('aa/bb');
        $this->assertEquals('aa/bb/', $result);

        $result = YamlDataLib::addSlashToPath('aa/bb/');
        $this->assertEquals('aa/bb/', $result);
    }
}
