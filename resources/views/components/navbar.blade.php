<nav class="bg-gray-800 border-b-2 border-yellow-600 shadow-lg">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <!-- Logo and Main Navigation -->
            <div class="flex">
                <div class="flex-shrink-0 flex items-center">
                    <a href="{{ url('/') }}" class="text-2xl font-bold text-yellow-500 hover:text-yellow-400" style="font-family: 'Cinzel', serif;">
                        {{ config('app.name') }}
                    </a>
                </div>
                <div class="hidden sm:ml-6 sm:flex sm:space-x-8">
                    <a href="{{ url('/') }}" class="text-gray-300 hover:text-yellow-400 inline-flex items-center px-3 py-2 text-sm font-medium">
                        Home
                    </a>
                    <a href="{{ route('news.index') }}" class="text-gray-300 hover:text-yellow-400 inline-flex items-center px-3 py-2 text-sm font-medium">
                        News
                    </a>
                    <a href="{{ route('forum.index') }}" class="text-gray-300 hover:text-yellow-400 inline-flex items-center px-3 py-2 text-sm font-medium">
                        Forum
                    </a>
                    <a href="{{ route('faq.index') }}" class="text-gray-300 hover:text-yellow-400 inline-flex items-center px-3 py-2 text-sm font-medium">
                        FAQ
                    </a>
                    <a href="{{ route('contact.create') }}" class="text-gray-300 hover:text-yellow-400 inline-flex items-center px-3 py-2 text-sm font-medium">
                        Contact
                    </a>
                </div>
            </div>

            <!-- User Menu -->
            <div class="flex items-center">
                @auth
                    <div class="ml-3 relative flex items-center space-x-4">
                        @if(auth()->user()->isAdmin())
                            <a href="{{ route('admin.dashboard') }}" class="text-red-400 hover:text-red-300 px-3 py-2 rounded-md text-sm font-medium">
                                Admin Panel
                            </a>
                        @endif
                        <a href="{{ route('messages.index') }}" class="text-gray-300 hover:text-yellow-400 px-3 py-2 rounded-md text-sm font-medium">
                            Messages
                        </a>
                        <a href="{{ route('profile.show', auth()->user()) }}" class="flex items-center text-gray-300 hover:text-yellow-400">
                            <x-user-avatar :user="auth()->user()" size="sm" />
                            <span class="ml-2">{{ auth()->user()->username ?? auth()->user()->name }}</span>
                        </a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="text-gray-300 hover:text-yellow-400 px-3 py-2 rounded-md text-sm font-medium">
                                Logout
                            </button>
                        </form>
                    </div>
                @else
                    <div class="space-x-4">
                        <a href="{{ route('login') }}" class="text-gray-300 hover:text-yellow-400 px-3 py-2 rounded-md text-sm font-medium">
                            Login
                        </a>
                        <a href="{{ route('register') }}" class="bg-yellow-600 hover:bg-yellow-700 text-gray-900 px-4 py-2 rounded-md text-sm font-bold">
                            Register
                        </a>
                    </div>
                @endauth
            </div>
        </div>
    </div>
</nav>
