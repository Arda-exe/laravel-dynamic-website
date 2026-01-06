@extends('layouts.admin')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <h1 class="text-3xl font-bold text-amber-400 mb-8">Admin Dashboard</h1>

    <!-- Statistics Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
        <div class="bg-slate-800 border border-amber-900/30 rounded-lg p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-slate-400 text-sm">Total Users</p>
                    <p class="text-3xl font-bold text-amber-400">{{ $stats['total_users'] }}</p>
                </div>
                <svg class="w-12 h-12 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                </svg>
            </div>
        </div>

        <div class="bg-slate-800 border border-amber-900/30 rounded-lg p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-slate-400 text-sm">Published News</p>
                    <p class="text-3xl font-bold text-amber-400">{{ $stats['published_news'] }}</p>
                </div>
                <svg class="w-12 h-12 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
                </svg>
            </div>
        </div>

        <div class="bg-slate-800 border border-amber-900/30 rounded-lg p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-slate-400 text-sm">Forum Threads</p>
                    <p class="text-3xl font-bold text-amber-400">{{ $stats['total_threads'] }}</p>
                </div>
                <svg class="w-12 h-12 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"></path>
                </svg>
            </div>
        </div>
    </div>

    <!-- Additional Stats Row -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <div class="bg-slate-800 border border-amber-900/30 rounded-lg p-6">
            <p class="text-slate-400 text-sm mb-2">Total Comments</p>
            <p class="text-2xl font-bold text-amber-400">{{ $stats['total_comments'] }}</p>
        </div>

        <div class="bg-slate-800 border border-amber-900/30 rounded-lg p-6">
            <p class="text-slate-400 text-sm mb-2">Forum Replies</p>
            <p class="text-2xl font-bold text-amber-400">{{ $stats['total_replies'] }}</p>
        </div>

        <div class="bg-slate-800 border border-amber-900/30 rounded-lg p-6">
            <p class="text-slate-400 text-sm mb-2">Total News</p>
            <p class="text-2xl font-bold text-amber-400">{{ $stats['total_news'] }}</p>
        </div>
    </div>

    <!-- Recent Activity -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <!-- Recent Users -->
        <div class="bg-slate-800 border border-amber-900/30 rounded-lg p-6">
            <h2 class="text-xl font-bold text-amber-400 mb-4">Recent Users</h2>
            <div class="space-y-3">
                @forelse($recent_users as $user)
                    <div class="flex items-center justify-between py-2 border-b border-slate-700 last:border-0">
                        <div class="flex items-center space-x-3">
                            <div class="w-10 h-10 rounded-full bg-amber-900/30 flex items-center justify-center">
                                @if($user->photo)
                                    <img src="{{ asset('storage/' . $user->photo) }}" alt="{{ $user->username }}" class="w-10 h-10 rounded-full object-cover">
                                @else
                                    <span class="text-amber-400 font-bold">{{ substr($user->username, 0, 1) }}</span>
                                @endif
                            </div>
                            <div>
                                <p class="text-slate-200">{{ $user->username }}</p>
                                <p class="text-xs text-slate-400">{{ $user->email }}</p>
                            </div>
                        </div>
                        <span class="text-xs text-slate-400">{{ $user->created_at->diffForHumans() }}</span>
                    </div>
                @empty
                    <p class="text-slate-400 text-center py-4">No recent users</p>
                @endforelse
            </div>
        </div>

        <!-- Recent News -->
        <div class="bg-slate-800 border border-amber-900/30 rounded-lg p-6">
            <h2 class="text-xl font-bold text-amber-400 mb-4">Recent News</h2>
            <div class="space-y-3">
                @forelse($recent_news as $article)
                    <div class="py-2 border-b border-slate-700 last:border-0">
                        <a href="{{ route('admin.news.edit', $article) }}" class="text-slate-200 hover:text-amber-400 font-medium">
                            {{ $article->title }}
                        </a>
                        <p class="text-xs text-slate-400 mt-1">
                            by {{ $article->user->username }} • {{ $article->created_at->diffForHumans() }}
                        </p>
                    </div>
                @empty
                    <p class="text-slate-400 text-center py-4">No recent news</p>
                @endforelse
            </div>
        </div>

        <!-- Recent Threads -->
        <div class="bg-slate-800 border border-amber-900/30 rounded-lg p-6">
            <h2 class="text-xl font-bold text-amber-400 mb-4">Recent Forum Threads</h2>
            <div class="space-y-3">
                @forelse($recent_threads as $thread)
                    <div class="py-2 border-b border-slate-700 last:border-0">
                        <a href="{{ route('forum.threads.show', $thread) }}" class="text-slate-200 hover:text-amber-400 font-medium">
                            {{ $thread->title }}
                        </a>
                        <p class="text-xs text-slate-400 mt-1">
                            in {{ $thread->category->name }} • by {{ $thread->user->username }} • {{ $thread->created_at->diffForHumans() }}
                        </p>
                    </div>
                @empty
                    <p class="text-slate-400 text-center py-4">No recent threads</p>
                @endforelse
            </div>
        </div>
    </div>
</div>
@endsection
