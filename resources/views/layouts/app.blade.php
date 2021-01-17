<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <!-- blade vorlage. (/resources/views/layouts/master.blade.php -->
    <!-------------------------------------------------------------------->
    <meta file="@yield('file')">
    <!-------------------------------------------------------------------->

    {{--    <title>{{ config('app.name', 'Laravelatu') }}</title>--}}
    <title>{{ $topmenu['brand'] }} -- {{ $testnr }}</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Larahorse, Stallverwaltung">
    <meta name="author" content="Roland Kruggel">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- JS, Popper.js, and jQuery --}}
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
            integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
            integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
            crossorigin="anonymous"></script>

    {{-- bootstrap --}}
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
            integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV"
            crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
          integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    {{-- editor codemirror
         aus: https://cdnjs.com/libraries/codemirror --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.59.1/codemirror.min.js"
            integrity="sha512-9fASXXoC6x4BKdqe6IcEYZnt4KPMiQx5YJIsiWevf2QpSXfPcXMj4MTzIbwQuKJRysBlRh1LGHIaQm/415WyEA=="
            crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.59.1/codemirror.min.css"
          integrity="sha512-MWdvo/Qqcf4pY1ecQUB1uBn0qLp19U/qJ1Rpp2BDZeuBA7YsFEwkvqR/+aG4BroPiAYDunKJ6X8R/Pmdt3p7oA=="
          crossorigin="anonymous"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.59.1/mode/yaml/yaml.min.js"
            integrity="sha512-ooFTzFn1/cr1fYJNQqqiZFVUiUZVO7M+QfadtRcUOGyq1RldSAAUKVwwUawX5MFlmSonsZkGWMYj44paSnK6Ow=="
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.59.1/mode/lua/lua.min.js" integrity="sha512-y9AUtl0J5yAFGJx0mcdHPVsba97LmWZ+00K+w78g3cx9klrn/5joZCH/KegMwhSnliF17Z46A50X773374wA/w==" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.59.1/mode/markdown/markdown.min.js" integrity="sha512-pPkSf38IdZFkYSNeSKtKBG1ou5FuWwHYuDEiRJRs29igFixW47YY2iIKWhSfDLbpZlI5NO5b3M28KW/u3K2hJw==" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.59.1/mode/php/php.min.js" integrity="sha512-jyLP33GKBy8PM3/KVNMuBWqMlTFvFTJhzbX2KW/JEmZs5mLmn51EYrTEUQNjbIIHOGeZ+ntIMnh5H/yAzh/EKA==" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.59.1/mode/javascript/javascript.min.js" integrity="sha512-ssJuYJm7WuzXiDvMgmhFfPcXAM3QLILVaH8VhLDkauwZRTSlw7uxxUh2TXDau3y2eK0PsJfzL/q0lYsjTEO8sQ==" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.59.1/addon/edit/closebrackets.min.js" integrity="sha512-owgR9zDpryEuq8/Y5qK7hr5HEreld3zm6FHbEGawfK6BeyV3fiDO5acPzFWIvFkdd45J2LIYKgV2ETcFKPmJMw==" crossorigin="anonymous"></script>

    {{--    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>--}}

    <!-- Master css -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" >

    <!-- Master js -->
    <script src="{{ asset('js/app.js') }}" ></script>

    <!-- (rk) stack('css') -->
    @stack('css')

    <!-- (rk) stack('scriptOnTop') -->
    @stack('scriptOnTop')

    <!-- (rk) livewireStyles-->
    @livewireStyles
</head>

{{--<body class="d-flex flex-column h-100">--}}
<body>
<div id="app">

    <!-- (rk) Menue  (app.blade.php) -->
    <header>
        <div
            class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
            <a class="my-0 mr-md-auto font-weight-normal text-dark" href="{{ url('/') }}">
                {{ $topmenu['brand'] ?? '' }} &nbsp;&nbsp;
                ( {{ $_SESSION['lara']['progname'] ?? '' }} )
            </a>
            <nav class="my-2 my-md-0 mr-md-3">
                @foreach($topmenu['menu'] as $tp)
                    <a class="p-2 text-dark btn-link" href="{{ $tp['url'] }}"
                       data-toggle="tooltip" data-html="true" title="{{ $tp['desc'] }}">
                        {{$tp['label']}}
                    </a>
                @endforeach
            </nav>
            <a class="btn btn-outline-primary btn-sm disabled" href="#">Sign up</a>
        </div>
    </header>

    <!-- (rk) Begin page content  (master.blade.php) -->
    <main role="main" class="flex-shrink-0">
        <div class="container-fluid p-3 p-md-5">
            {{--                @ yield('content')--}}
            {{ $slot  }}
            </div>
        </main>

        <!-- (rk) beginn footer (master.blade.php) -->
        <footer class="bd-footer text-muted fixed-bottom">
            <hr>
                <div class="container-fluid mx-3">
                <p>
                    {{ config('app.name') }} v0.0.1.; Date Okt. 2020; Author Roland Kruggel; Licensed
                    <a href="https://opensource.org/licenses/MIT" target="_blank" rel="license noopener">MIT</a>
                </p>
            </div>
        </footer>

    </div>


    <!-- (rk) Modal window content (stack('modal'))  (master.blade.php) -->
    @yield('modal')

    <!-- (rk) bottom-stack script (stack('scriptOnBottom'))  (master.blade.php) -->
    @stack('scriptOnBottom')

    <!-- (rk) Das Livewire Script (master.blade.php) -->
    @livewireScripts

    <!-- (rk) ende -->
</body>

</html>
