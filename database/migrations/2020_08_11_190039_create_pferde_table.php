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
 * @file		2020_08_11_190039_create_pferde_table.php
 * @path		/home/roland/Develop/Larahorse/database/migrations/2020_08_11_190039_create_pferde_table.php
 * @lastChange	20.11.20, 10:22 by roland
 */

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Query\Expression;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


class CreatePferdeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pferdes', function (Blueprint $table) {
            $table->id();
            $table->string('name', 20)->comment('Ladina');
            $table->string('rufname', 50)->comment('Ladina');
            $table->date('geboren')->nullable()->comment('12.5.2002');
            $table->string('rasse',30)->nullable()->comment('Hannoveraner');
            $table->string('sex', 20)->nullable()->comment('Stute');
            $table->string('type', 20)->nullable()->comment('Warmblut');
            $table->foreignId('zuechter_id')->nullable()->comment('Meier');
            $table->json('jfield')->nullable();   //->default(new Expression('(JSON_ARRAY())'));
            $table->string('bemerkung')->nullable()->comment('');
            $table->timestamps();
            //$table->softDeletes();
            //$table->engine = 'InnoDB';

            $table->foreign('zuechter_id')->references('id')->on('pusers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pferdes');
    }
}
