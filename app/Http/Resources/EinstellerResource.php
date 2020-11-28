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
 * @file		EinstellerResource.php
 * @path		/home/roland/Develop/Larahorse/app/Http/Resources/EinstellerResource.php
 * @lastChange	20.11.20, 10:19 by roland
 */

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EinstellerResource extends JsonResource
{

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
//        return parent::toArray($request);
        $ujj = $this->resource;
        return [
            'data' => $this->resource,
            'links' => [
                'self' => 'link-value2',
            ],
        ];
    }


    /**
     * Get additional data that should be returned with the resource array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function with($request)
    {
        return [
            'meta' => [
                'key' => 'value',
            ],
        ];
    }

}
