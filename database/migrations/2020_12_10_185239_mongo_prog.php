<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MongoProg extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // -- daten aus der DB holen
        $client = new MongoDB\Client("mongodb://localhost:27017");
        $collection = $client->Larahorse->Progs;

        // collection löschen wenn vorhanden
        $response = $collection->drop();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
