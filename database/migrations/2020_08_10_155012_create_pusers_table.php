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
 * @file		2020_08_10_155012_create_pusers_table.php
 * @path		/home/roland/Develop/Larahorse/database/migrations/2020_08_10_155012_create_pusers_table.php
 * @lastChange	20.11.20, 10:22 by roland
 */

/*
 * Erstellen der Migration:
 * ------------------------
 * Erstellen eines neuen Migrationsfiles.
 *   - wechsel ins Projekt Verzeichnis (projektroot)
 *     cd ~/devilbox/data/www/larahorse/laravel-project
 *   - den Rumpf erstellen
 *     php artisan make:migration create_addres_table
 *   Ist in => ./database/migrations
 *
 * die Migration aufrufen
 *   php artisan migrate
 *   php artisan migrate:rollback       // ruft wieder den letzten schritt zurück
 *
 * Daten hinzufügen
 * ----------------
 *   - einen Seeder erstellen
 *     php artisan make:seeder PuserSeeder
 */

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Query\Expression;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePusersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pusers', function (Blueprint $table) {
            $table->id();
            $table->integer('aktive')->default(1)->comment('0=config; 1=aktive; 2=deaktiv');
            $table->string('anrede', 30)->nullable()->comment('lbl=Anrede; Herr, Frau, Herr Dr.');
            $table->string('title', 50)->nullable()->comment('Dr. ');
            $table->string('vorname', 50)->nullable()->comment('lbl=Vorname; Roland, Thomas, ...');
            $table->string('nachname', 30)->comment('lbl=Nachname; Kruggel, Müller, ...');
            $table->string('rufname', 30)->nullable()->comment('Bspl: Tom');
            $table->string('zusatz', 50)->nullable()->comment('Bspl: Programmierer und Pferdetrainer');
            $table->string('email', 100)->nullable()->comment('Bspl: rkruggel@bbf7.de');
            $table->string('www', 100)->nullable()->comment('Bspl: www.bbf7.de');
            $table->string('anschrift', 150)->nullable()->comment('Bspl: Beverstr. 12, 58553 Halver');
            $table->date('geb')->nullable()->comment('Bspl: 02.01.1959');
            $table->string('landsmann', 15)->nullable()->comment('Bspl: deutsch');
            $table->json('jtelefon')->nullable();   //->default(new Expression('(JSON_ARRAY())'));
            $table->json('jfield')->nullable();     //->default(new Expression('(JSON_ARRAY())'));
            $table->string('aufgabe', 150)->nullable()->comment('Bspl: Pferd,Reitbeteiligung,Boxenpflege, Trainer');
            $table->text('bemerkung')->nullable();
            $table->timestamps();
            //$table->softDeletes();
            //$table->engine = 'InnoDB';
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pusers');
    }
}
