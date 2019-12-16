<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>
            @yield('title')
        </title>

        @include('layout.partial.styles')
        
        @include('layout.partial.scripts')

    </head>
    <body>

       @include('layout.partial.navbar')
        
        <!-- Page Content -->
        <div class="container">
            
            @include('layout.partial.alerts')

            @yield('content')
            
        </div>

        @yield('styles')


        @yield('scripts')

    </body>
</html>
