<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <title inertia>{{ config('app.name', 'Laravel') }}</title>

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">


        @routes
        @viteReactRefresh
        @vite(['resources/js/user.jsx', "resources/js/Pages/{$page['component']}.jsx"])
        @inertiaHead
       
        <meta name="csrf-token" content="{{ csrf_token() }}">
    </head>
    <body class="font-sans antialiased">

        <x-common.header />
            @inertia
        <x-common.footer />

        @env ('local')
            <!-- <script src="http://localhost:8080/js/bundle.js"></script> -->
        @endenv
    </body>
</html>
