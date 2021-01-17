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
 * @file		YamlDataTest.php
 * @path		/home/roland/Develop/Larahorse/tests/Library/YamlDataTest.php
 * @lastChange	16.01.21, 17:12 by roland
 *
 */

namespace Tests\Library;

use App\Library\YamlData;
use PHPUnit\Framework\TestCase;

//use Tests\TestCase;
use ReflectionClass;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class YamlDataTest extends TestCase
{

    //    im Test       => /home/roland/Develop/Larahorse
    //    im release    => /home/roland/Develop/Larahorse/public

//    public function test_sepExtension()
//    {
//        $aa = getcwd();         // => /home/roland/Develop/Larahorse
//
//        $object = new YamlData();
//        $reflector = new ReflectionClass( 'App\Library\YamlData' );
//        $method = $reflector->getMethod( '_sepExtension' );
//        $method->setAccessible( true );
//
//        $result = $method->invokeArgs( $object, array( '/aa/bb/cc' ) );
//        $this->assertEquals( 'cc.yaml', $result ); // whatever your assertion is
//
//        $result = $method->invokeArgs( $object, array( '/aa/bb/cc.yaml' ) );
//        $this->assertEquals( 'cc.yaml', $result ); // whatever your assertion is
//
//        $result = $method->invokeArgs( $object, array( 'cc' ) );
//        $this->assertEquals( 'cc.yaml', $result ); // whatever your assertion is
//
//        $result = $method->invokeArgs( $object, array( 'cc.yaml' ) );
//        $this->assertEquals( 'cc.yaml', $result ); // whatever your assertion is
//
//    }

//    public function test_isYamlFile()
//    {
//        $object = new YamlData();
//        $reflector = new ReflectionClass( 'App\Library\YamlData' );
//        $method = $reflector->getMethod( '_isYamlFile' );
//        $method->setAccessible( true );
//
//        $result = $method->invokeArgs( $object, array( 'main' ) );
//        $this->assertEquals( 'cc.yaml', $result ); // whatever your assertion is
//
//    }

//    public function testInitYamlDb()
//    {
//        $psth = '/home/roland/Develop/Larahorse/app/Siteconfig/Tests';
//
//        try {
//            (new YamlData)->initYamlDb();
//        } catch (Exception $e) {
//            $this->assertFalse();
//        }
//
//        $this->assertTrue();
//    }

    public function testReadYamlDbToText()
    {
        $cls = new YamlData();
        $erg = $cls->readYamlDbToText('demoForTest');

        $this->assertFalse();
    }

    public function testReadYamlDbToArray()
    {
        $cls = new YamlData();
        $erg = $cls->readYamlDbToArray('demoForTest');

        $this->assertFalse();
    }

    public function testUpdateYamlDb()
    {
        $cls = new YamlData();
        $erg = $cls->updateYamlDb(null);

        $this->assertFalse();
    }

}
