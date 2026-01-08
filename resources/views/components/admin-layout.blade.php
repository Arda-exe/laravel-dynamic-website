<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Admin Panel - {{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=cinzel:400,600,700|merriweather:300,400,700&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="antialiased text-slate-200 flex flex-col min-h-screen" style="background-image: linear-gradient(to bottom, rgba(2, 6, 23, 0.85), rgba(15, 23, 42, 0.85), rgba(2, 6, 23, 0.85)), url('{{ asset('images/wallpaper.png') }}'); background-attachment: fixed; background-size: cover; background-position: center; background-repeat: no-repeat;">
        <div class="flex flex-col flex-grow">
            <!-- Admin Navigation -->
            <nav class="bg-slate-950/80 backdrop-blur-sm shadow-2xl border-b border-red-900/30">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="flex justify-between h-16">
                        <div class="flex items-center">
                            <a href="{{ route('admin.dashboard') }}" class="text-xl font-bold text-amber-400 hover:text-amber-300 transition-colors">
                                Admin Panel
                            </a>
                        </div>
                        <div class="flex items-center space-x-4">
                            <a href="{{ route('home') }}" class="text-amber-400 hover:text-amber-300 transition-colors" target="_blank">
                                View Site
                            </a>
                            <span class="text-slate-500">|</span>
                            <span class="text-slate-300">{{ auth()->user()->username ?? auth()->user()->name }}</span>
                        </div>
                    </div>
                </div>
            </nav>

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
            <main class="flex-grow py-8">
                {{ $slot }}
            </main>
        </div>

        <!-- Footer -->
        <footer class="elden-border mt-auto bg-slate-950/50 backdrop-blur-sm">
            <div class="max-w-7xl mx-auto py-8 px-4 sm:px-6 lg:px-8">
                <div class="text-center">
                    <p class="text-amber-400/70 text-sm font-light">
                        &copy; {{ date('Y') }} Elden Ring Forum - Admin Panel
                    </p>
                </div>
            </div>
        </footer>
    </body>
</html>
