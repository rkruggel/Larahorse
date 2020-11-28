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
 * @file		2020_08_16_121159_create_userpferd_table.php
 * @path		/home/roland/Develop/Larahorse/database/migrations/2020_08_16_121159_create_userpferd_table.php
 * @lastChange	20.11.20, 10:22 by roland
 */

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Query\Expression;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserpferdTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {


        Schema::create('userpferds', function (Blueprint $table) {
            $table->id();
            $table->string('pferdename');
            $table->json('jarzt');
            $table->json('jpersonen');
            $table->integer('futterplan');
            $table->integer('weideplan');
            $table->integer('bewegungsplan');
            $table->integer('deckenplan');
            $table->string('misten');
            $table->string('einstreu');
            $table->string('medikamente');
            $table->json('jfield')->nullable();   //->default(new Expression('(JSON_ARRAY())'));
            $table->string('bemerkung');
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('userpferds');
    }
}
