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
 * @file		EinstellerCollection.php
 * @path		/home/roland/Develop/Larahorse/app/Http/Resources/EinstellerCollection.php
 * @lastChange	06.01.21, 15:57 by roland
 *
 */

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class EinstellerCollection extends ResourceCollection
{

    /**
     * Customize the outgoing response for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Illuminate\Http\Response  $response
     * @return void
     */
    public function withResponse($request, $response)
    {
        $response->header('X-Value3', 'True');
    }


    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
//        return parent::toArray($request);

        $ujj = $this->collection;
        return [
            'data' => $this->collection,
            'links' => [
                'self' => 'link-value',
            ],
        ];
    }
}
