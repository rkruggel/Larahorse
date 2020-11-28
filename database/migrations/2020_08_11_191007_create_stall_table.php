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
 * @file		2020_08_11_191007_create_stall_table.php
 * @path		/home/roland/Develop/Larahorse/database/migrations/2020_08_11_191007_create_stall_table.php
 * @lastChange	20.11.20, 10:22 by roland
 */

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Query\Expression;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStallTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stalls', function (Blueprint $table) {
            $table->id();
            $table->string('stallname', 30)->nullable()->comment('');
            $table->foreignId('stalladdresse_id')->nullable()->unsigned()->comment('');
            $table->foreignId('betreiber_id')->nullable()->unsigned()->comment('');
            $table->date('gruendung')->nullable()->comment('');
            $table->string('bemerkung')->nullable()->comment('');
            $table->json('jfield')->nullable();   //->default(new Expression('(JSON_ARRAY())'));
            $table->timestamps();
            //$table->softDeletes();
            //$table->engine = 'InnoDB';

            $table->foreign('betreiber_id')->references('id')->on('pusers');
            $table->foreign('stalladdresse_id')->references('id')->on('pusers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stalls');
    }
}
