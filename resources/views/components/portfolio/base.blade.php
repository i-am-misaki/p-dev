<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="relative">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    </head>
    <body class="font-sans text-gray-900">
        {{ $header }}
        <div class="flex justify-center items-center">
            <div class="w-full dark:bg-gray-800">
                {{ $slot }}
            </div>
        </div>
        {{ $footer }}
        <script src="{{ asset('/js/make_select.js') }}"></script>
    </body>
</html>
