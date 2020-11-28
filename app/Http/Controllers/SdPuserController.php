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
 * @file		SdPuserController.php
 * @path		/home/roland/Develop/Larahorse/app/Http/Controllers/SdPuserController.php
 * @lastChange	20.11.20, 10:19 by roland
 */

namespace App\Http\Controllers;

use App\Models\Pusers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Schema;



class SdPuserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Use Schema builder here
        $columns1 = Schema::getColumnListing('puser');



        $user2 = Pusers::where('id','>=',0)
            -> orderBy('nachname')
            -> get();
        $j1 = $user2[7];
        $j2 = $j1->jtelefon;

        $user2 = Pusers::all();


        $user3 = DB::table('pusers')
            ->orderBy('nachname')
            ->get();

        return response()
            ->view('stammdaten.puser.index', ['users' => $user2])
            ->header('content-type', 'text/html');
    }

    public function useredit()
    {
        $usere = Pusers::class;
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
     * @param  \App\Models\Pusers  $puser
     * @return \Illuminate\Http\Response
     */
    public function show(Pusers $puser)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pusers  $puser
     * @return \Illuminate\Http\Response
     */
    public function edit(Pusers $puser)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pusers  $puser
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pusers $puser)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pusers  $puser
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pusers $puser)
    {
        //
    }
}
