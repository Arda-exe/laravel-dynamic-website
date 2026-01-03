<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=cinzel:400,600,700|merriweather:300,400,700&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="antialiased text-slate-200">
        <div class="min-h-screen">
            <x-navbar />

            <!-- Flash Messages -->
            @if(session('success'))
                <x-alert type="success" :message="session('success')" />
            @endif

            @if(session('error'))
                <x-alert type="error" :message="session('error')" />
            @endif

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-slate-950/80 backdrop-blur-sm shadow-2xl border-b border-amber-900/20">
                    <div class="max-w-7xl mx-auto py-8 px-4 sm:px-6 lg:px-8">
                        <h1 class="text-4xl font-bold elden-title">
                            {{ $header }}
                        </h1>
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main class="py-12">
                {{ $slot }}
            </main>

            <!-- Footer -->
            <footer class="elden-border mt-16 bg-slate-950/50 backdrop-blur-sm">
                <div class="max-w-7xl mx-auto py-8 px-4 sm:px-6 lg:px-8">
                    <div class="text-center">
                        <p class="text-amber-400/70 text-sm font-light">
                            &copy; {{ date('Y') }} Elden Ring Forum. Rise, Tarnished.
                        </p>
                    </div>
                </div>
            </footer>
        </div>
    </body>
</html>
