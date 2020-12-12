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

use App\Models\pusers;
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



        $user2 = pusers::where('id','>=',0)
            -> orderBy('nachname')
            -> get();
        $j1 = $user2[7];
        $j2 = $j1->jtelefon;

        $user2 = pusers::all();


        $user3 = DB::table('pusers')
            ->orderBy('nachname')
            ->get();

        return response()
            ->view('stammdaten.puser.index', ['users' => $user2])
            ->header('content-type', 'text/html');
    }

    public function useredit()
    {
        $usere = pusers::class;
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
     * @param  \App\Models\pusers  $puser
     * @return \Illuminate\Http\Response
     */
    public function show(pusers $puser)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\pusers  $puser
     * @return \Illuminate\Http\Response
     */
    public function edit(pusers $puser)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\pusers  $puser
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, pusers $puser)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\pusers  $puser
     * @return \Illuminate\Http\Response
     */
    public function destroy(pusers $puser)
    {
        //
    }
}
