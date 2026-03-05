<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        {{-- <title>{{ config('app.name', 'SIGDOL') }}</title> --}}
        <title>@yield('title')</title>
        <link rel="icon" type="image/png" href="{{asset('images/SIGDOL/Sistema de gestión-ico.ico')}}"  />

        <!-- Fonts -->
        {{-- <link rel="preconnect" href="https://fonts.bunny.net"> --}}
        {{-- <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" /> --}}

        <!-- <link rel="stylesheet" href="path/to/bootstrap.min.css"> -->
        
        <!-- para los js modales -->
        <!-- <link href="https://cdn.jsdelivr.net" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> -->

        <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
        <link href="{{ asset('css/upel.css') }}" rel="stylesheet">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js']) 
      <!--   @vite(['resources/sass/app.scss', 'resources/js/app.js'])antes-->

        <!-- Styles -->
        @livewireStyles
    </head>
    <body class="">

        <x-header />

        <div class="">
            {{-- MENU Y USER --}}
            @if(Auth::user())
                @livewire('navigation-menu')
            @endif
            <!-- Page title -->
                {{-- <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $page }}
                    </div>
                </header> --}}
            <!-- Page Content -->
            <main class="">
                {{ $slot }}
            </main>
        </div>


        @stack('modals')

        @livewireScripts

    {{-- script de Modal's --}}

    <!-- <script src="path/to/bootstrap.bundle.min.js"></script> -->
  <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script> -->

        <x-footer/>
    </body>
</html>
