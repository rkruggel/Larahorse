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
 * @file		ExampleTest.php
 * @path		/home/roland/Develop/Larahorse/tests/Unit/ExampleTest.php
 * @lastChange	19.11.20, 18:45 by roland
 */

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $this->assertTrue(true);
    }

    public function test2BasicTest()
    {
        $this->assertEquals(6, 5);
    }
}
