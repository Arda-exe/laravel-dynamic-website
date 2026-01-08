<x-admin-layout>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Quick Action Buttons -->
        <div class="mb-6 grid grid-cols-2 md:grid-cols-4 gap-4">
            <a href="{{ route('admin.users.create') }}" class="elden-button text-center py-4">
                <svg class="w-6 h-6 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
                </svg>
                New User
            </a>
            <a href="{{ route('admin.news.create') }}" class="elden-button text-center py-4">
                <svg class="w-6 h-6 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                </svg>
                New Article
            </a>
            <a href="{{ route('admin.faqs.create') }}" class="elden-button text-center py-4">
                <svg class="w-6 h-6 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                New FAQ
            </a>
            <a href="{{ route('admin.faq-categories.create') }}" class="elden-button text-center py-4">
                <svg class="w-6 h-6 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                </svg>
                New Category
            </a>
        </div>

        <!-- Unread Contact Submissions Alert -->
        @if($stats['unread_contacts'] > 0)
            <div class="mb-6 bg-red-900/20 border border-red-600/30 rounded-lg p-4">
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <svg class="w-6 h-6 text-red-400 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                        <div>
                            <h3 class="text-red-300 font-semibold">You have {{ $stats['unread_contacts'] }} unread contact {{ Str::plural('submission', $stats['unread_contacts']) }}</h3>
                            <p class="text-red-400/70 text-sm">Please review and respond to user inquiries</p>
                        </div>
                    </div>
                    <a href="{{ route('admin.contact-submissions.index') }}" class="bg-red-600 hover:bg-red-500 text-white font-bold py-2 px-4 rounded transition duration-300">
                        View All
                    </a>
                </div>
            </div>
        @endif

        <!-- Quick Stats -->
        <div class="mb-6 grid grid-cols-2 md:grid-cols-4 gap-4">
            <div class="bg-slate-900/50 border border-amber-900/30 rounded-lg p-4">
                <p class="text-slate-400 text-xs uppercase tracking-wider mb-1">Total Users</p>
                <p class="text-2xl font-bold text-amber-400">{{ $stats['total_users'] }}</p>
            </div>
            <div class="bg-slate-900/50 border border-amber-900/30 rounded-lg p-4">
                <p class="text-slate-400 text-xs uppercase tracking-wider mb-1">News Articles</p>
                <p class="text-2xl font-bold text-amber-400">{{ $stats['total_news'] }}</p>
            </div>
            <div class="bg-slate-900/50 border border-amber-900/30 rounded-lg p-4">
                <p class="text-slate-400 text-xs uppercase tracking-wider mb-1">FAQs</p>
                <p class="text-2xl font-bold text-amber-400">{{ $stats['total_faqs'] }}</p>
            </div>
            <div class="bg-slate-900/50 border border-amber-900/30 rounded-lg p-4">
                <p class="text-slate-400 text-xs uppercase tracking-wider mb-1">FAQ Categories</p>
                <p class="text-2xl font-bold text-amber-400">{{ $stats['total_faq_categories'] }}</p>
            </div>
        </div>

        <!-- Three-Column Recent Activity -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <!-- Recent Users -->
            <div class="bg-slate-900/50 border border-amber-900/30 rounded-lg overflow-hidden">
                <div class="bg-slate-950/50 px-6 py-4 border-b border-amber-900/20">
                    <h3 class="text-lg font-semibold text-amber-400">Recent Users</h3>
                </div>
                <div class="p-6">
                    <div class="space-y-4">
                        @forelse($recent_users as $user)
                            <div class="flex items-center space-x-3">
                                <x-user-avatar :user="$user" size="sm" />
                                <div class="flex-1 min-w-0">
                                    <p class="text-sm font-medium text-slate-200 truncate">{{ $user->name }}</p>
                                    <div class="flex items-center gap-2">
                                        <p class="text-xs text-slate-400">{{ $user->created_at->format('M d, Y') }}</p>
                                        @if($user->role === 'admin')
                                            <span class="px-1.5 py-0.5 text-xs font-semibold rounded bg-red-900/30 text-red-400">Admin</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @empty
                            <p class="text-slate-400 text-center text-sm py-4">No recent users</p>
                        @endforelse
                    </div>
                    <div class="mt-4 pt-4 border-t border-slate-700">
                        <a href="{{ route('admin.users.index') }}" class="text-amber-400 hover:text-amber-300 text-sm font-medium">
                            View All Users →
                        </a>
                    </div>
                </div>
            </div>

            <!-- Recent News -->
            <div class="bg-slate-900/50 border border-amber-900/30 rounded-lg overflow-hidden">
                <div class="bg-slate-950/50 px-6 py-4 border-b border-amber-900/20">
                    <h3 class="text-lg font-semibold text-amber-400">Recent News</h3>
                </div>
                <div class="p-6">
                    <div class="space-y-4">
                        @forelse($recent_news as $article)
                            <div>
                                <a href="{{ route('admin.news.edit', $article) }}" class="text-sm font-medium text-slate-200 hover:text-amber-400 line-clamp-2">
                                    {{ $article->title }}
                                </a>
                                <div class="flex items-center gap-2 mt-1">
                                    <p class="text-xs text-slate-400">{{ $article->user->username ?? 'Unknown' }}</p>
                                    <span class="text-slate-600">•</span>
                                    @if($article->published_at)
                                        <span class="px-1.5 py-0.5 text-xs font-semibold rounded bg-green-900/30 text-green-400">Published</span>
                                    @else
                                        <span class="px-1.5 py-0.5 text-xs font-semibold rounded bg-yellow-900/30 text-yellow-400">Draft</span>
                                    @endif
                                    <span class="text-slate-600">•</span>
                                    <p class="text-xs text-slate-400">{{ $article->created_at->format('M d') }}</p>
                                </div>
                            </div>
                        @empty
                            <p class="text-slate-400 text-center text-sm py-4">No recent news</p>
                        @endforelse
                    </div>
                    <div class="mt-4 pt-4 border-t border-slate-700">
                        <a href="{{ route('admin.news.index') }}" class="text-amber-400 hover:text-amber-300 text-sm font-medium">
                            View All News →
                        </a>
                    </div>
                </div>
            </div>

            <!-- Recent Contact Submissions -->
            <div class="bg-slate-900/50 border border-amber-900/30 rounded-lg overflow-hidden">
                <div class="bg-slate-950/50 px-6 py-4 border-b border-amber-900/20">
                    <h3 class="text-lg font-semibold text-amber-400">Recent Submissions</h3>
                </div>
                <div class="p-6">
                    <div class="space-y-4">
                        @forelse($recent_contacts as $contact)
                            <div>
                                <a href="{{ route('admin.contact-submissions.show', $contact) }}" class="text-sm font-medium text-slate-200 hover:text-amber-400 line-clamp-1">
                                    {{ $contact->name }}
                                </a>
                                <p class="text-xs text-slate-400 truncate mt-1">{{ $contact->subject }}</p>
                                <div class="flex items-center gap-2 mt-1">
                                    <p class="text-xs text-slate-400">{{ $contact->created_at->format('M d, Y') }}</p>
                                    @if(!$contact->is_read)
                                        <span class="px-1.5 py-0.5 text-xs font-semibold rounded bg-red-900/30 text-red-400">Unread</span>
                                    @endif
                                </div>
                            </div>
                        @empty
                            <p class="text-slate-400 text-center text-sm py-4">No recent submissions</p>
                        @endforelse
                    </div>
                    <div class="mt-4 pt-4 border-t border-slate-700">
                        <a href="{{ route('admin.contact-submissions.index') }}" class="text-amber-400 hover:text-amber-300 text-sm font-medium">
                            View All Submissions →
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
