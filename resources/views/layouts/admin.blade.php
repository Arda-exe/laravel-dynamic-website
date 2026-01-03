<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Admin - {{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=cinzel:400,600,700&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased bg-gray-900 text-gray-100">
        <div class="min-h-screen">
            <!-- Admin Navigation -->
            <nav class="bg-red-900 border-b-2 border-red-700 shadow-lg">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="flex justify-between h-16">
                        <div class="flex">
                            <div class="flex-shrink-0 flex items-center">
                                <a href="{{ route('dashboard') }}" class="text-xl font-bold text-yellow-400" style="font-family: 'Cinzel', serif;">
                                    Admin Panel
                                </a>
                            </div>
                        </div>
                        <div class="flex items-center">
                            <a href="{{ url('/') }}" class="text-gray-300 hover:text-yellow-400 px-3 py-2 rounded-md text-sm font-medium">
                                Back to Site
                            </a>
                            <form method="POST" action="{{ route('logout') }}" class="ml-3">
                                @csrf
                                <button type="submit" class="text-gray-300 hover:text-yellow-400 px-3 py-2 rounded-md text-sm font-medium">
                                    Logout
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </nav>

            <div class="flex">
                <!-- Sidebar -->
                <x-admin-sidebar />

                <!-- Main Content -->
                <div class="flex-1">
                    <!-- Flash Messages -->
                    @if(session('success'))
                        <x-alert type="success" :message="session('success')" />
                    @endif

                    @if(session('error'))
                        <x-alert type="error" :message="session('error')" />
                    @endif

                    <!-- Page Heading -->
                    @isset($header)
                        <header class="bg-gray-800 shadow-lg border-b-2 border-red-700">
                            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                                <h1 class="text-3xl font-bold text-red-400" style="font-family: 'Cinzel', serif;">
                                    {{ $header }}
                                </h1>
                            </div>
                        </header>
                    @endisset

                    <!-- Page Content -->
                    <main class="p-8">
                        {{ $slot }}
                    </main>
                </div>
            </div>
        </div>
    </body>
</html>
