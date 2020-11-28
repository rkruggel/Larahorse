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
 * @file		2020_08_11_190051_create_einsteller_table.php
 * @path		/home/roland/Develop/Larahorse/database/migrations/2020_08_11_190051_create_einsteller_table.php
 * @lastChange	20.11.20, 10:22 by roland
 */

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Query\Expression;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEinstellerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('einstellers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pusers_id');
            $table->string('type', 30)->comment('Einsteller, Reitbeteiligung, Züchter, Ausbilder, Sonstige');
            $table->foreignId('usrpferd');
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
        Schema::dropIfExists('einstellers');
    }
}
