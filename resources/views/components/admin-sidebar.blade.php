<aside class="w-64 bg-slate-950/80 backdrop-blur-sm min-h-screen border-r border-amber-900/30">
    <nav class="p-4 space-y-2">
        <!-- Dashboard -->
        <a href="{{ route('admin.dashboard') }}"
           class="flex items-center px-4 py-3 text-slate-300 hover:bg-amber-900/20 hover:text-amber-400 rounded transition-colors duration-200 {{ request()->routeIs('admin.dashboard') ? 'bg-amber-900/30 text-amber-400 border border-amber-900/50' : '' }}">
            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
            </svg>
            Dashboard
        </a>

        <!-- Users Section -->
        <div x-data="{ open: {{ request()->routeIs('admin.users.*') ? 'true' : 'false' }} }">
            <button @click="open = !open" class="w-full flex items-center justify-between px-4 py-3 text-slate-300 hover:bg-amber-900/20 hover:text-amber-400 rounded transition-colors duration-200 {{ request()->routeIs('admin.users.*') ? 'bg-amber-900/30 text-amber-400 border border-amber-900/50' : '' }}">
                <div class="flex items-center">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                    </svg>
                    Users
                </div>
                <svg class="w-4 h-4 transition-transform" :class="{ 'rotate-180': open }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                </svg>
            </button>
            <div x-show="open" x-transition class="ml-8 mt-1 space-y-1">
                <a href="{{ route('admin.users.index') }}" class="flex items-center px-4 py-2 text-sm text-slate-400 hover:text-amber-400 transition-colors duration-200 {{ request()->routeIs('admin.users.index') ? 'text-amber-400' : '' }}">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                    </svg>
                    All Users
                </a>
                <a href="{{ route('admin.users.create') }}" class="flex items-center px-4 py-2 text-sm text-slate-400 hover:text-amber-400 transition-colors duration-200 {{ request()->routeIs('admin.users.create') ? 'text-amber-400' : '' }}">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                    </svg>
                    Add User
                </a>
            </div>
        </div>

        <!-- News Management -->
        <a href="{{ route('admin.news.index') }}"
           class="flex items-center px-4 py-3 text-slate-300 hover:bg-amber-900/20 hover:text-amber-400 rounded transition-colors duration-200 {{ request()->routeIs('admin.news.*') ? 'bg-amber-900/30 text-amber-400 border border-amber-900/50' : '' }}">
            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
            </svg>
            News Articles
        </a>

        <!-- FAQ Management Section -->
        <div x-data="{ open: {{ request()->routeIs('admin.faq*') ? 'true' : 'false' }} }">
            <button @click="open = !open" class="w-full flex items-center justify-between px-4 py-3 text-slate-300 hover:bg-amber-900/20 hover:text-amber-400 rounded transition-colors duration-200 {{ request()->routeIs('admin.faq*') ? 'bg-amber-900/30 text-amber-400 border border-amber-900/50' : '' }}">
                <div class="flex items-center">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    FAQ Management
                </div>
                <svg class="w-4 h-4 transition-transform" :class="{ 'rotate-180': open }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                </svg>
            </button>
            <div x-show="open" x-transition class="ml-8 mt-1 space-y-1">
                <a href="{{ route('admin.faq-categories.index') }}" class="flex items-center px-4 py-2 text-sm text-slate-400 hover:text-amber-400 transition-colors duration-200 {{ request()->routeIs('admin.faq-categories.*') ? 'text-amber-400' : '' }}">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                    </svg>
                    Categories
                </a>
                <a href="{{ route('admin.faqs.index') }}" class="flex items-center px-4 py-2 text-sm text-slate-400 hover:text-amber-400 transition-colors duration-200 {{ request()->routeIs('admin.faqs.*') && !request()->routeIs('admin.faq-categories.*') ? 'text-amber-400' : '' }}">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"></path>
                    </svg>
                    Questions
                </a>
            </div>
        </div>

        <!-- Contact Submissions -->
        <a href="{{ route('admin.contact-submissions.index') }}"
           class="flex items-center px-4 py-3 text-slate-300 hover:bg-amber-900/20 hover:text-amber-400 rounded transition-colors duration-200 {{ request()->routeIs('admin.contact-submissions.*') ? 'bg-amber-900/30 text-amber-400 border border-amber-900/50' : '' }}">
            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
            </svg>
            Contact Submissions
        </a>
    </nav>
</aside>
