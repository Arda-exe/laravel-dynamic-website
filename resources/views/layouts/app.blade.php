<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=cinzel:400,600,700&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased bg-gray-900 text-gray-100">
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
                <header class="bg-gray-800 shadow-lg border-b-2 border-yellow-600">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        <h1 class="text-3xl font-bold text-yellow-500" style="font-family: 'Cinzel', serif;">
                            {{ $header }}
                        </h1>
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main class="py-8">
                {{ $slot }}
            </main>

            <!-- Footer -->
            <footer class="bg-gray-800 border-t-2 border-yellow-600 mt-12">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 text-center text-gray-400">
                    <p>&copy; {{ date('Y') }} {{ config('app.name') }}. All rights reserved.</p>
                </div>
            </footer>
        </div>
    </body>
</html>
