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
 * @file		JsonDbDaten.php
 * @path		/home/roland/Develop/Larahorse/app/Library/JsonDbDaten.php
 * @lastChange	22.11.20, 11:02 by roland
 */

namespace App\Library;


use App\Models\Pusers;
use Database\Seeders\PusersSeeder;
use Illuminate\Support\Facades\DB;




/*

Die Config und Meta Daten


  "meta" : {
    "fieldtype"  : ["string", "text", "number", "integer", "combo", "date"]
  },


  "config" : {
    "landsmann" : {
      "order"   : 2,
      "anzeige" : "Landsm.",
      "type"    : "string",
      "format"  : "",
      "default" : "deutscher"
    },
    "gehalt" : {
      "order"   : 8,
      "anzeige" : "Verdienst",
      "type"    : "number",
      "format"  : "",
      "default" : 122000.00
    },

    ...

  }
}'

Die Daten
---------

'{
  "data" : {
    "landsmann" : {
      "gruppe" : "test",
      "value"   : null
    },
    "gehalt" : {
      "gruppe" : "test",
      "value"   : null
    },
    "anrede" : {
      "gruppe" : "test",
      "value"   : null
    },
    "titel" : {
      "gruppe" : "test",
      "value"   : null
    },
    "startdate" : {
      "gruppe" : "test",
      "value"   : null
    },
    "bem" : {
      "gruppe" : "test",
      "value"   : null
    }
  }
}'

*/

/**
 * Class JsonDbDaten
 * Jede Tabelle enthält das Feld 'jfield'. Es enthält Felder und Feldnamen die Dynamisch verändert werden können.  Es
 *  können sowohl Felder hinzugefügt als auch entfernt werden.
 * Diese Klasse erleichtert die Verarbeitung der Daten.
 * Oben ist eine Dokumentierte jfield-Json
 *
 * @package App\Library
 */
class JsonDbDaten
{

    /**
     * ??
     *
     * @param mixed $data
     * @return string
     */
    public static function getJfield($data)
    {
        return $data->jfield;
    }

    /**
     * @param string $tabelle
     * @return array
     */
    public static function __getMetaConfig_Puser(string $tabelle) {
        $rr = DB::table($tabelle)->select('jfield')->find(1);
        return Helpers::string2json($rr->jfield, true);
    }

    /**
     * Gibt ein Array der meta-Daten zurück.
     *
     * @param string $tablle
     * @return array
     */
    public static function getMeta(string $tablle) {
        $ta = self::__getMetaConfig_Puser($tablle);
        /** @var array $ti */
        $ti = $ta['meta'];
        return $ti;
    }

    /**
     * Gibt ein Array der Config-Daten zurück.
     *
     * @param string $tablle
     * @return array
     */
    public static function getConfig(string $tablle) {
        $ta = self::__getMetaConfig_Puser($tablle);
        /** @var array $ti */
        $ti = $ta['config'];
        return $ti;
    }
}
