@extends('layouts.master')

@section('file', 'larahorse/resources/views/start.blade.php')


@section('content')
    @parent

<!--    --><?php //echo phpInfo(); die(); ?>

    <p>branch_01</p>

    <div id="startscreen">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4 p-md-5">
                    {{--        <livewire:select-prog :post='testpost'/>--}}
                    <livewire:select-prog />
                </div>
                <div class="col-md-8">
                    <h1 class="display-6">Larahorse</h1>
                    <p class="text-muted">
                        Programm zur Verwaltung von Pferdeställen<br>
                        und alle dazugehörigen Dingen.
                    </p>
                </div>
            </div>


        </div>
    </div>
@endsection

