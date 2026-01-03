<x-app-layout>
    <x-slot name="header">
        {{ $article->title }}
    </x-slot>

    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
        <article class="elden-card overflow-hidden">
            @if($article->image)
                <div class="relative h-[500px] overflow-hidden">
                    <img src="{{ asset('storage/' . $article->image) }}"
                         alt="{{ $article->title }}"
                         class="w-full h-full object-cover">
                    <div class="absolute inset-0 bg-gradient-to-t from-slate-950 via-slate-950/50 to-transparent"></div>
                </div>
            @endif

            <div class="p-10">
                <div class="flex items-center gap-4 mb-8 pb-6 border-b border-amber-900/20">
                    <x-user-avatar :user="$article->user" size="lg" />
                    <div>
                        <p class="text-amber-400 font-semibold text-lg">
                            {{ $article->user->username ?? $article->user->name }}
                        </p>
                        <p class="text-slate-400 text-sm flex items-center gap-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                            {{ $article->published_at->format('F j, Y \a\t g:i A') }}
                        </p>
                    </div>
                </div>

                <div class="prose prose-lg prose-invert max-w-none">
                    <div class="text-slate-200 leading-relaxed text-lg space-y-4">
                        {!! nl2br(e($article->content)) !!}
                    </div>
                </div>

                <div class="mt-12 pt-8 elden-border">
                    <a href="{{ route('news.index') }}"
                       class="inline-flex items-center gap-2 text-amber-400 hover:text-amber-300 font-medium transition-colors group">
                        <svg class="w-5 h-5 group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                        </svg>
                        <span>Back to News</span>
                    </a>
                </div>
            </div>
        </article>

        <!-- Comments Section -->
        <div class="mt-8">
            <div class="elden-card p-8">
                <h2 class="text-2xl font-bold mb-6 elden-text-gold" style="font-family: 'Cinzel', serif;">
                    Comments ({{ $article->comments->count() }})
                </h2>

                @auth
                    <!-- Comment Form -->
                    <form method="POST" action="{{ route('comments.store', $article) }}" class="mb-8">
                        @csrf
                        <div class="mb-4">
                            <label for="content" class="block text-sm font-medium text-amber-400 mb-2">
                                Add a comment
                            </label>
                            <textarea id="content"
                                      name="content"
                                      rows="4"
                                      required
                                      maxlength="1000"
                                      class="elden-input w-full px-4 py-2"
                                      placeholder="Share your thoughts...">{{ old('content') }}</textarea>
                            @error('content')
                                <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                            @enderror
                        </div>
                        <button type="submit" class="elden-button">
                            Post Comment
                        </button>
                    </form>
                @else
                    <p class="mb-8 text-slate-400">
                        <a href="{{ route('login') }}" class="text-amber-400 hover:text-amber-300">Login</a>
                        to leave a comment.
                    </p>
                @endauth

                <!-- Comments List -->
                <div class="space-y-4">
                    @forelse($article->comments()->with('user')->latest()->get() as $comment)
                        <x-comment-item :comment="$comment" />
                    @empty
                        <p class="text-center text-slate-400 py-8">
                            No comments yet. Be the first to comment!
                        </p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
