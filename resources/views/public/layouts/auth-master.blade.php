<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Hubbell Products México</title>

        {{-- app css --}}
        <link rel="stylesheet" href="{{ asset('css/public.css') }}">

        {{-- page specific css --}}
        @yield('page-css')
    </head>

    <body>

        @yield('main-content')

        {{-- common js --}}
        <script src="{{mix('assets/js/common-public-script.js')}}"></script>

        {{-- page specific javascript --}}
        @yield('page-js')

        <!-- yield js bottom -->
        @yield('bottom-js')
    </body>

</html>
