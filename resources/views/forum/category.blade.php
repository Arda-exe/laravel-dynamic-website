<x-app-layout>
    <x-slot name="header">
        {{ $category->name }}
    </x-slot>

    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="mb-6 flex items-center justify-between">
            <a href="{{ route('forum.index') }}" class="text-amber-400 hover:text-amber-300">
                ← Back to Forum
            </a>

            @auth
                <a href="{{ route('forum.threads.create', ['category' => $category->slug]) }}" class="elden-button">
                    Create New Thread
                </a>
            @endauth
        </div>

        @if($category->description)
            <div class="elden-card p-6 mb-6">
                <p class="text-slate-300">{{ $category->description }}</p>
            </div>
        @endif

        @if($threads->isEmpty())
            <div class="elden-card p-12 text-center">
                <p class="text-slate-400 text-lg mb-4">No threads in this category yet.</p>
                @auth
                    <a href="{{ route('forum.threads.create', ['category' => $category->slug]) }}" class="elden-button">
                        Be the first to start a discussion
                    </a>
                @endauth
            </div>
        @else
            <div class="space-y-3">
                @foreach($threads as $thread)
                    <div class="elden-card p-5 hover:shadow-2xl transition-shadow {{ $thread->is_pinned ? 'border-2 border-amber-600/50' : '' }}">
                        <div class="flex items-start gap-4">
                            <div class="flex-shrink-0">
                                <x-user-avatar :user="$thread->user" size="md" />
                            </div>

                            <div class="flex-grow min-w-0">
                                <div class="flex items-start justify-between gap-4">
                                    <div class="flex-grow min-w-0">
                                        <a href="{{ route('forum.threads.show', $thread->slug) }}" class="block group">
                                            <h3 class="text-lg font-bold text-amber-400 group-hover:text-amber-300 transition-colors mb-1">
                                                @if($thread->is_pinned)
                                                    <span class="text-amber-600">📌</span>
                                                @endif
                                                @if($thread->is_locked)
                                                    <span class="text-slate-500">🔒</span>
                                                @endif
                                                {{ $thread->title }}
                                            </h3>
                                        </a>

                                        <div class="flex items-center gap-4 text-sm text-slate-400">
                                            <span>By <a href="{{ route('profile.show', $thread->user) }}" class="text-amber-400 hover:text-amber-300">{{ $thread->user->name }}</a></span>
                                            <span>{{ $thread->created_at->diffForHumans() }}</span>
                                        </div>
                                    </div>

                                    <div class="flex-shrink-0 text-right">
                                        <div class="text-sm">
                                            <span class="text-amber-400 font-bold">{{ $thread->replies_count }}</span>
                                            <span class="text-slate-400">{{ Str::plural('reply', $thread->replies_count) }}</span>
                                        </div>
                                    </div>
                                </div>

                                <p class="text-slate-300 mt-2 line-clamp-2">
                                    {{ Str::limit(strip_tags($thread->content), 150) }}
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="mt-6">
                {{ $threads->links() }}
            </div>
        @endif
    </div>
</x-app-layout>
