@extends('layouts.app')

@section('content')
<!-- Hero Section -->
<div class="elden-border border-b-2 py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4 text-center">
        <h1 class="text-5xl md:text-6xl font-bold elden-title mb-4">Elden Ring Forum</h1>
        <p class="text-xl text-slate-300 mb-8 max-w-2xl mx-auto">
            Join the community of Tarnished warriors. Share strategies, discuss lore, and conquer the Lands Between together.
        </p>
        <div class="flex flex-wrap justify-center gap-4">
            <a href="{{ route('forum.index') }}" class="elden-button">
                Browse Forum
            </a>
        </div>
    </div>
</div>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <!-- Latest News Section -->
    <div class="mb-12">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-3xl font-bold elden-text-gold" style="font-family: 'Cinzel', serif;">Latest News</h2>
            <a href="{{ route('news.index') }}" class="text-amber-500 hover:text-amber-400 transition">
                View All →
            </a>
        </div>

        @if($latest_news->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($latest_news as $article)
                    <div class="elden-card overflow-hidden">
                        @if($article->image)
                            <img src="{{ asset('storage/' . $article->image) }}" alt="{{ $article->title }}" class="w-full h-48 object-cover">
                        @else
                            <img src="{{ asset('images/default.jpg') }}" alt="{{ $article->title }}" class="w-full h-48 object-cover">
                        @endif
                        <div class="p-5">
                            <h3 class="text-xl font-bold text-slate-200 mb-2 hover:text-amber-400 transition">
                                <a href="{{ route('news.show', $article->slug) }}">{{ $article->title }}</a>
                            </h3>
                            <p class="text-slate-400 text-sm mb-3 line-clamp-2">{{ $article->excerpt }}</p>
                            <div class="flex items-center justify-between text-xs text-slate-500">
                                <span>By {{ $article->user->name }}</span>
                                <span>{{ $article->published_at->diffForHumans() }}</span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="elden-card p-8 text-center">
                <p class="text-slate-400">No news articles published yet.</p>
            </div>
        @endif
    </div>

    <!-- Latest Forum Threads Section -->
    <div>
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-3xl font-bold elden-text-gold" style="font-family: 'Cinzel', serif;">Latest Forum Discussions</h2>
            <a href="{{ route('forum.index') }}" class="text-amber-500 hover:text-amber-400 transition">
                View All →
            </a>
        </div>

        @if($latest_threads->count() > 0)
            <div class="elden-card divide-y divide-slate-700">
                @foreach($latest_threads as $thread)
                    <div class="p-5">
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
                                        {{ $thread->user->name }}
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
            <div class="elden-card p-8 text-center">
                <p class="text-slate-400">No forum threads yet. Be the first to start a discussion!</p>
            </div>
        @endif
    </div>
</div>
@endsection
