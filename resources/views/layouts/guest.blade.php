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
    <body class="font-sans antialiased">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-slate-950 relative">
            <!-- Background overlay -->
            <div class="absolute inset-0 bg-[url('https://images.unsplash.com/photo-1614732414444-096e5f1122d5?q=80&w=1974')] bg-cover bg-center opacity-10"></div>

            <div class="relative z-10">
                <a href="/">
                    <h1 class="text-4xl font-bold elden-title mb-2" style="font-family: 'Cinzel', serif;">Elden Ring</h1>
                </a>
            </div>

            <div class="w-full sm:max-w-md mt-6 px-8 py-6 elden-card shadow-2xl overflow-hidden sm:rounded-lg relative z-10">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
