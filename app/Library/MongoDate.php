<?php


namespace App\Library;

use MongoDB;
use DateTime;



class MongoDate
{

    private static function getDatetime($date=null){
        if($date == null)
        {
            $datetime = (new MongoDB\BSON\UTCDateTime())->toDateTime();
        } else {
            $datetime = (new MongoDB\BSON\UTCDateTime(new DateTime($date)))->toDateTime();
        }
        return $datetime;
    }


    public static function dateJetztAry($date = null): array
    {

        $datetime = self::getDatetime();

        $ary = [
            "ts" => $datetime->format('U.u'),
            "datelong" => $datetime->format('r')
        ];

        return $ary;
    }

}
