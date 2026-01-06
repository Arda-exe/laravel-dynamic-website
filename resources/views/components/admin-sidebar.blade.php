<aside class="w-64 bg-gray-800 min-h-screen border-r-2 border-red-700">
    <nav class="p-4 space-y-2">
        <!-- Dashboard -->
        <a href="{{ route('admin.dashboard') }}"
           class="flex items-center px-4 py-3 text-gray-300 hover:bg-red-900 hover:text-yellow-400 rounded {{ request()->routeIs('admin.dashboard') ? 'bg-red-900 text-yellow-400' : '' }}">
            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
            </svg>
            Dashboard
        </a>

        <!-- News Management -->
        <a href="{{ route('admin.news.index') }}"
           class="flex items-center px-4 py-3 text-gray-300 hover:bg-red-900 hover:text-yellow-400 rounded {{ request()->routeIs('admin.news.*') ? 'bg-red-900 text-yellow-400' : '' }}">
            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
            </svg>
            News Articles
        </a>

        <!-- User Management -->
        <a href="{{ route('admin.users.index') }}"
           class="flex items-center px-4 py-3 text-gray-300 hover:bg-red-900 hover:text-yellow-400 rounded {{ request()->routeIs('admin.users.*') ? 'bg-red-900 text-yellow-400' : '' }}">
            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
            </svg>
            Users
        </a>

        <!-- Contact Submissions -->
        <a href="{{ route('admin.contact-submissions.index') }}"
           class="flex items-center px-4 py-3 text-gray-300 hover:bg-red-900 hover:text-yellow-400 rounded {{ request()->routeIs('admin.contact-submissions.*') ? 'bg-red-900 text-yellow-400' : '' }}">
            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
            </svg>
            Contact Submissions
        </a>
    </nav>
</aside>
