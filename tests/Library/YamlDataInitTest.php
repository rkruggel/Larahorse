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
 * @file		YamlDataInitTest.php
 * @path		/home/roland/Develop/Larahorse/tests/Library/YamlDataInitTest.php
 * @lastChange	16.01.21, 17:12 by roland
 *
 */

namespace Tests\Library;

use App\Library\YamlDataInit;
use PHPUnit\Framework\TestCase;

//use Tests\TestCase;
use ReflectionClass;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class YamlDataInitTest extends TestCase
{

//    public function test__construct()
//    {
//
//    }

    public function test_sepExtension()
    {
        $aa = getcwd();         // => /home/roland/Develop/Larahorse

        $object = new YamlDataInit();
        $reflector = new ReflectionClass('App\Library\YamlDataInit');
        $method = $reflector->getMethod('_sepExtension');
        $method->setAccessible(true);

        $result = $method->invokeArgs($object, array('/aa/bb/cc'));
        $this->assertEquals('cc.yaml', $result); // whatever your assertion is

        $result = $method->invokeArgs($object, array('/aa/bb/cc.yaml'));
        $this->assertEquals('cc.yaml', $result); // whatever your assertion is

        $result = $method->invokeArgs($object, array('cc'));
        $this->assertEquals('cc.yaml', $result); // whatever your assertion is

        $result = $method->invokeArgs($object, array('cc.yaml'));
        $this->assertEquals('cc.yaml', $result); // whatever your assertion is

    }

    public function test_isYamlFile()
    {
        $object = new YamlDataInit();
        $reflector = new ReflectionClass('App\Library\YamlDataInit');
        $method = $reflector->getMethod('_isYamlFile');
        $method->setAccessible(true);

        $result = $method->invokeArgs($object, array('main'));
        $this->assertEquals('app/Siteconfig/Tests/main.yaml', $result['data']); // whatever your assertion is

    }

    public function test_makeFile()
    {
        $object = new YamlDataInit();
        $reflector = new ReflectionClass('App\Library\YamlDataInit');
        $method = $reflector->getMethod('_makeFile');
        $method->setAccessible(true);

        $result = $method->invokeArgs($object, array('demoForTest'));
        $this->assertEquals('app/Siteconfig/Tests/demoForTest.yaml', $result['data']); // whatever your assertion is

    }

    public function testReadTextFromYamlfile()
    {
        $object = new YamlDataInit();
        $reflector = new ReflectionClass('App\Library\YamlDataInit');
        $method = $reflector->getMethod('readTextFromYamlfile');
        $method->setAccessible(true);

        $result = $method->invokeArgs($object, array('demoForTest'));
        $result2 = substr($result, 0, 39);
        $this->assertEquals('zumtest: Dieser Eintrag ist zum Testen.', $result2); // whatever your assertion is

    }


    public function testYamlDirEntrys()
    {
        $object = new YamlDataInit();
        $reflector = new ReflectionClass('App\Library\YamlDataInit');
        $method = $reflector->getMethod('yamlDirEntrys');
        $method->setAccessible(true);

        $result = $method->invokeArgs($object, array());
        $this->assertEquals('demoForTest', $result[0]);

    }

    public function testInitYamlDb()
    {
        $class = new YamlDataInit();
        try {
            $class->initYamlDb();
        } catch (\Exception $e) {
            $this->assertFalse('da ist was schief gelaufen');
        }

        $this->assertTrue(true);
    }


}
