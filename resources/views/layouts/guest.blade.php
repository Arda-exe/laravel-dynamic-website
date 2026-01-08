<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;600;700&family=Merriweather:wght@300;400;700&display=swap" rel="stylesheet">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased" style="background-image: linear-gradient(to bottom, rgba(2, 6, 23, 0.85), rgba(15, 23, 42, 0.85), rgba(2, 6, 23, 0.85)), url('{{ asset('images/wallpaper.png') }}'); background-attachment: fixed; background-size: cover; background-position: center; background-repeat: no-repeat;">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0">
            <div class="w-full sm:max-w-md px-8 py-6 elden-card shadow-2xl overflow-hidden sm:rounded-lg relative z-10">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
