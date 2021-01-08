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
 * @file		SdPferdeController.php
 * @path		/home/roland/Develop/Larahorse/app/Http/Controllers/SdPferdeController.php
 * @lastChange	06.01.21, 15:57 by roland
 *
 */

namespace App\Http\Controllers;

use App\Models\pferde;
use Illuminate\Http\Request;

class SdPferdeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return response()
            ->view('stammdaten.pferde.index')
            ->header('content-type', 'text/html');
            //  ->header('content-type', 'text/plain');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\pferde  $pferde
     * @return \Illuminate\Http\Response
     */
    public function show(pferde $pferde)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\pferde  $pferde
     * @return \Illuminate\Http\Response
     */
    public function edit(pferde $pferde)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\pferde  $pferde
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, pferde $pferde)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\pferde  $pferde
     * @return \Illuminate\Http\Response
     */
    public function destroy(pferde $pferde)
    {
        //
    }
}
