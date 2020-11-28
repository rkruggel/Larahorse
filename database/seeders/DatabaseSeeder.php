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
 * @file		DatabaseSeeder.php
 * @path		/home/roland/Develop/Larahorse/database/seeders/DatabaseSeeder.php
 * @lastChange	20.11.20, 10:22 by roland
 */

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            PusersSeeder::class,
            PferdeSeeder::class,
            StallSeeder::class,
            UserPferdSeeder::class,
            EinstellerSeeder::class
        ]);
    }
}

