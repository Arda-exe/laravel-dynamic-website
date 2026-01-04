@extends('layouts.app')

@section('content')
<!-- Hero Section -->
<div class="bg-gradient-to-b from-slate-900 via-slate-800 to-slate-900 border-b-2 border-amber-900/50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 text-center">
        <h1 class="text-5xl md:text-6xl font-bold text-amber-400 mb-4 font-serif">Elden Ring Forum</h1>
        <p class="text-xl text-slate-300 mb-8 max-w-2xl mx-auto">
            Join the community of Tarnished warriors. Share strategies, discuss lore, and conquer the Lands Between together.
        </p>
        <div class="flex flex-wrap justify-center gap-4">
            <a href="{{ route('news.index') }}" class="bg-amber-600 hover:bg-amber-700 text-slate-900 font-bold py-3 px-6 rounded-lg transition duration-300">
                Latest News
            </a>
            <a href="{{ route('forum.index') }}" class="bg-slate-700 hover:bg-slate-600 text-amber-400 font-bold py-3 px-6 rounded-lg border-2 border-amber-900/50 transition duration-300">
                Browse Forum
            </a>
        </div>
    </div>
</div>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <!-- Latest News Section -->
    <div class="mb-12">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-3xl font-bold text-amber-400 font-serif">Latest News</h2>
            <a href="{{ route('news.index') }}" class="text-amber-500 hover:text-amber-400 transition">
                View All →
            </a>
        </div>

        @if($latest_news->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($latest_news as $article)
                    <div class="bg-slate-800 border border-amber-900/30 rounded-lg overflow-hidden hover:border-amber-700/50 transition duration-300">
                        @if($article->image)
                            <img src="{{ asset('storage/' . $article->image) }}" alt="{{ $article->title }}" class="w-full h-48 object-cover">
                        @else
                            <div class="w-full h-48 bg-gradient-to-br from-amber-900/20 to-slate-800 flex items-center justify-center">
                                <svg class="w-16 h-16 text-amber-900/50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
                                </svg>
                            </div>
                        @endif
                        <div class="p-5">
                            <h3 class="text-xl font-bold text-slate-200 mb-2 hover:text-amber-400 transition">
                                <a href="{{ route('news.show', $article->slug) }}">{{ $article->title }}</a>
                            </h3>
                            <p class="text-slate-400 text-sm mb-3 line-clamp-2">{{ $article->excerpt }}</p>
                            <div class="flex items-center justify-between text-xs text-slate-500">
                                <span>By {{ $article->user->username }}</span>
                                <span>{{ $article->published_at->diffForHumans() }}</span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="bg-slate-800 border border-amber-900/30 rounded-lg p-8 text-center">
                <p class="text-slate-400">No news articles published yet.</p>
            </div>
        @endif
    </div>

    <!-- Latest Forum Threads Section -->
    <div>
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-3xl font-bold text-amber-400 font-serif">Latest Forum Discussions</h2>
            <a href="{{ route('forum.index') }}" class="text-amber-500 hover:text-amber-400 transition">
                View All →
            </a>
        </div>

        @if($latest_threads->count() > 0)
            <div class="bg-slate-800 border border-amber-900/30 rounded-lg divide-y divide-slate-700">
                @foreach($latest_threads as $thread)
                    <div class="p-5 hover:bg-slate-750 transition">
                        <div class="flex items-start justify-between">
                            <div class="flex-1">
                                <div class="flex items-center gap-2 mb-2">
                                    @if($thread->is_pinned)
                                        <svg class="w-4 h-4 text-amber-500" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M10 2a.75.75 0 01.75.75v1.5a.75.75 0 01-1.5 0v-1.5A.75.75 0 0110 2zM10 15a.75.75 0 01.75.75v1.5a.75.75 0 01-1.5 0v-1.5A.75.75 0 0110 15zM10 7a3 3 0 100 6 3 3 0 000-6zM15.657 5.404a.75.75 0 10-1.06-1.06l-1.061 1.06a.75.75 0 001.06 1.06l1.06-1.06zM6.464 14.596a.75.75 0 10-1.06-1.06l-1.06 1.06a.75.75 0 001.06 1.06l1.06-1.06zM18 10a.75.75 0 01-.75.75h-1.5a.75.75 0 010-1.5h1.5A.75.75 0 0118 10zM5 10a.75.75 0 01-.75.75h-1.5a.75.75 0 010-1.5h1.5A.75.75 0 015 10zM14.596 15.657a.75.75 0 001.06-1.06l-1.06-1.061a.75.75 0 10-1.06 1.06l1.06 1.06zM5.404 6.464a.75.75 0 001.06-1.06l-1.06-1.06a.75.75 0 10-1.061 1.06l1.06 1.06z" />
                                        </svg>
                                    @endif
                                    <span class="text-xs text-amber-500 font-medium">{{ $thread->category->name }}</span>
                                </div>
                                <h3 class="text-lg font-bold text-slate-200 mb-2 hover:text-amber-400 transition">
                                    <a href="{{ route('forum.threads.show', $thread) }}">{{ $thread->title }}</a>
                                </h3>
                                <div class="flex items-center gap-4 text-xs text-slate-500">
                                    <span class="flex items-center gap-1">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                        </svg>
                                        {{ $thread->user->username }}
                                    </span>
                                    <span class="flex items-center gap-1">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"></path>
                                        </svg>
                                        {{ $thread->replies_count ?? $thread->replies->count() }} replies
                                    </span>
                                    <span>{{ $thread->created_at->diffForHumans() }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="bg-slate-800 border border-amber-900/30 rounded-lg p-8 text-center">
                <p class="text-slate-400">No forum threads yet. Be the first to start a discussion!</p>
            </div>
        @endif
    </div>

    <!-- Call to Action -->
    <div class="mt-12 bg-gradient-to-r from-amber-900/20 to-slate-800 border border-amber-900/50 rounded-lg p-8 text-center">
        <h3 class="text-2xl font-bold text-amber-400 mb-3 font-serif">Join the Community</h3>
        <p class="text-slate-300 mb-6 max-w-2xl mx-auto">
            Connect with fellow Tarnished, share your experiences, and get help with the toughest bosses.
        </p>
        @guest
            <div class="flex justify-center gap-4">
                <a href="{{ route('register') }}" class="bg-amber-600 hover:bg-amber-700 text-slate-900 font-bold py-2 px-6 rounded-lg transition duration-300">
                    Register Now
                </a>
                <a href="{{ route('login') }}" class="bg-slate-700 hover:bg-slate-600 text-amber-400 font-bold py-2 px-6 rounded-lg border-2 border-amber-900/50 transition duration-300">
                    Login
                </a>
            </div>
        @else
            <a href="{{ route('forum.threads.create') }}" class="inline-block bg-amber-600 hover:bg-amber-700 text-slate-900 font-bold py-2 px-6 rounded-lg transition duration-300">
                Start a Discussion
            </a>
        @endguest
    </div>
</div>
@endsection
