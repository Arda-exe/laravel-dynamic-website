<nav class="bg-slate-950/90 backdrop-blur-md border-b border-amber-900/30 shadow-2xl sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-20">
            <!-- Logo and Main Navigation -->
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <a href="{{ route('home') }}" class="text-3xl font-bold elden-text-gold hover:text-amber-300 transition-colors" style="font-family: 'Cinzel', serif;">
                        {{ config('app.name') }}
                    </a>
                </div>
                <div class="hidden sm:ml-10 sm:flex sm:space-x-1">
                    <a href="{{ route('home') }}" class="text-slate-300 hover:text-amber-400 hover:bg-slate-900/50 inline-flex items-center px-4 py-2 text-sm font-medium rounded-md transition-all">
                        Home
                    </a>
                    <a href="{{ route('news.index') }}" class="text-slate-300 hover:text-amber-400 hover:bg-slate-900/50 inline-flex items-center px-4 py-2 text-sm font-medium rounded-md transition-all">
                        News
                    </a>
                    <a href="{{ route('forum.index') }}" class="text-slate-300 hover:text-amber-400 hover:bg-slate-900/50 inline-flex items-center px-4 py-2 text-sm font-medium rounded-md transition-all">
                        Forum
                    </a>
                    <a href="{{ route('faq.index') }}" class="text-slate-300 hover:text-amber-400 hover:bg-slate-900/50 inline-flex items-center px-4 py-2 text-sm font-medium rounded-md transition-all">
                        FAQ
                    </a>
                    <a href="{{ route('contact.create') }}" class="text-slate-300 hover:text-amber-400 hover:bg-slate-900/50 inline-flex items-center px-4 py-2 text-sm font-medium rounded-md transition-all">
                        Contact
                    </a>
                </div>
            </div>

            <!-- User Menu -->
            <div class="flex items-center space-x-3">
                @auth
                    @if(auth()->user()->isAdmin())
                        <a href="{{ route('admin.dashboard') }}" class="text-red-400 hover:text-red-300 hover:bg-red-950/30 px-4 py-2 rounded-md text-sm font-medium transition-all">
                            <span class="hidden sm:inline">Admin Panel</span>
                            <span class="sm:hidden">Admin</span>
                        </a>
                    @endif
                    <a href="{{ route('profile.show', auth()->user()) }}" class="flex items-center text-slate-300 hover:text-amber-400 hover:bg-slate-900/50 px-3 py-2 rounded-md transition-all">
                        <x-user-avatar :user="auth()->user()" size="sm" />
                        <span class="ml-2 hidden md:inline text-sm font-medium">{{ auth()->user()->username ?? auth()->user()->name }}</span>
                    </a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="text-slate-400 hover:text-amber-400 hover:bg-slate-900/50 px-4 py-2 rounded-md text-sm font-medium transition-all">
                            Logout
                        </button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="text-slate-300 hover:text-amber-400 hover:bg-slate-900/50 px-4 py-2 rounded-md text-sm font-medium transition-all">
                        Login
                    </a>
                    <a href="{{ route('register') }}" class="elden-button text-sm">
                        Register
                    </a>
                @endauth
            </div>
        </div>
    </div>
</nav>
