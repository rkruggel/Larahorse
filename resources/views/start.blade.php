@extends('layouts.master')

@section('file', 'larahorse/resources/views/start.blade.php')


@section('content')
    @parent

    <?php
//    echo "<pre>";
//        print_r(PDO::getAvailableDrivers());
//    echo "<pre>";
    ?>

    <?php //echo phpInfo(); ?>

    <p>branch_01</p>

    <div id="startscreen" class="jumbotron jumbotron-fluid">
        <div class="container-fluid">
            <h1 class="display-2">LaraHorse</h1>
            <p class="lead text-muted">
                Programm zur Verwaltung von Pferdeställen<br>
                und alle dazugehörigen Dingen.
            </p>
        </div>
    </div>
@endsection

