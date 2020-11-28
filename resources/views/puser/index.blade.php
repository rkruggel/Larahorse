@extends('layouts.master')

@section('file', 'larahorse/resources/views/puser/index.blade.php')

{{--@section('title', 'LaraHorse')--}}

{{--@section('sidebar')--}}
{{--    @parent--}}

{{--    <p>This is appended to the master sidebar.</p>--}}
{{--@endsection--}}



@section('content')
    @parent

    <p class="lead">
        Programm Puser (Livewire Part)
        <br>
{{--        <livewire:puser-main :post='testpost'/>--}}
        <livewire:puser-main />
    </p>
@endsection

