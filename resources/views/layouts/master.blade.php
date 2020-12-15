<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <!-- blade vorlage. (/resources/views/layouts/master.blade.php -->
    <!-------------------------------------------------------------------->
    <meta file="@yield('file')">
    <!-------------------------------------------------------------------->

    <title>{{ config('app.name', 'Laravelatu') }}</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Larahorse, Stallverwaltung">
    <meta name="author" content="Roland Kruggel">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- bootstrap -->
    <!-- CSS only -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <!-- JS, Popper.js, and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

{{--    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>--}}

    <!-- Master css -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" >

    <!-- Master js -->
    <script src="{{ asset('js/app.js') }}" ></script>

    <!-- hier stack css -->
    @stack('css')

    <!-- hier top-stack script -->
    @stack('scriptOnTop')

    @livewireStyles
</head>

{{--<body class="d-flex flex-column h-100">--}}
<body>
    <div id="app">
        <!--
            Menue  (master.blade.php)
        -->
        <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
            <a class="my-0 mr-md-auto font-weight-normal text-dark" href="{{ url('/') }}">
                {{ config('app.name') }}
{{--                {{ Config::get('lara.progname') }}--}}
{{--                {{ $value }}--}}
            </a>

            <nav class="my-2 my-md-0 mr-md-3">
                <a class="p-2 text-dark btn-link" href="{{ url('/puser/index') }}"
                   data-toggle="tooltip" data-html="true" title="Alles von den Usern" >Puser</a>
                <a class="p-2 text-dark btn-link" href="#">Enterprise</a>
                <a class="p-2 text-dark btn-link" href="#">Support</a>
                <a class="p-2 text-dark btn-link" href="#">Pricing</a>
            </nav>
            <a class="btn btn-outline-primary btn-sm disabled" href="#">Sign up</a>
        </div>


        <!-- Begin page content -->
        <main role="main" class="flex-shrink-0">
            <div class="container-fluid p-3 p-md-5">
                @yield('content')
            </div>
        </main>

        <footer class="bd-footer text-muted fixed-bottom">
            <hr>
                <div class="container-fluid mx-3">
                <p>
                    {{ config('app.name') }} v0.0.1.; date Okt. 2020; Code licensed
                    <a href="https://github.com/twbs/bootstrap/blob/main/LICENSE" target="_blank" rel="license noopener">MIT</a>, docs
                    <a href="https://creativecommons.org/licenses/by/3.0/" target="_blank" rel="license noopener">CC BY 3.0</a>.
                </p>
            </div>
        </footer>


    </div>

    <!-- hier bottom-stack script -->
    @stack('scriptOnBottom')

    @livewireScripts

</body>

</html>
