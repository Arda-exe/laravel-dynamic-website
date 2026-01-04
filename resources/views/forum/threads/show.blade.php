<x-app-layout>
    <x-slot name="header">
        {{ $thread->title }}
    </x-slot>

    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="mb-6">
            <a href="{{ route('forum.category.show', $thread->category->slug) }}" class="text-amber-400 hover:text-amber-300">
                ← Back to {{ $thread->category->name }}
            </a>
        </div>

        <!-- Original Thread Post -->
        <div class="elden-card p-8 mb-6">
            <div class="flex items-start gap-6">
                <div class="flex-shrink-0">
                    <x-user-avatar :user="$thread->user" size="lg" />
                </div>

                <div class="flex-grow">
                    <div class="flex items-start justify-between mb-4">
                        <div>
                            <h3 class="text-lg font-bold text-amber-400">
                                <a href="{{ route('profile.show', $thread->user) }}" class="hover:text-amber-300">
                                    {{ $thread->user->name }}
                                </a>
                            </h3>
                            <p class="text-sm text-slate-400">{{ $thread->created_at->format('M d, Y \a\t g:i A') }}</p>
                        </div>

                        @auth
                            @if(auth()->id() === $thread->user_id || auth()->user()->isAdmin())
                                <div class="flex items-center gap-2">
                                    <a href="{{ route('forum.threads.edit', $thread) }}" class="text-amber-400 hover:text-amber-300 text-sm">
                                        Edit
                                    </a>
                                    <form method="POST" action="{{ route('forum.threads.destroy', $thread) }}"
                                          onsubmit="return confirm('Are you sure you want to delete this thread?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-400 hover:text-red-300 text-sm">
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            @endif
                        @endauth
                    </div>

                    <div class="prose prose-invert max-w-none">
                        <p class="text-slate-200 whitespace-pre-wrap">{{ $thread->content }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Replies -->
        <div class="mb-8">
            <h3 class="text-2xl font-bold text-amber-400 mb-6" style="font-family: 'Cinzel', serif;">
                Replies ({{ $thread->replies->count() }})
            </h3>

            @if($replies->isEmpty())
                <div class="elden-card p-12 text-center">
                    <p class="text-slate-400">No replies yet. Be the first to respond!</p>
                </div>
            @else
                <div class="space-y-4">
                    @foreach($replies as $reply)
                        <div class="elden-card p-6">
                            <div class="flex items-start gap-4">
                                <div class="flex-shrink-0">
                                    <x-user-avatar :user="$reply->user" size="md" />
                                </div>

                                <div class="flex-grow">
                                    <div class="flex items-start justify-between mb-3">
                                        <div>
                                            <h4 class="font-bold text-amber-400">
                                                <a href="{{ route('profile.show', $reply->user) }}" class="hover:text-amber-300">
                                                    {{ $reply->user->name }}
                                                </a>
                                            </h4>
                                            <p class="text-xs text-slate-400">{{ $reply->created_at->diffForHumans() }}</p>
                                        </div>

                                        @auth
                                            @if(auth()->id() === $reply->user_id || auth()->user()->isAdmin())
                                                <form method="POST" action="{{ route('forum.replies.destroy', $reply) }}"
                                                      onsubmit="return confirm('Are you sure you want to delete this reply?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="text-red-400 hover:text-red-300 text-sm">
                                                        Delete
                                                    </button>
                                                </form>
                                            @endif
                                        @endauth
                                    </div>

                                    <p class="text-slate-300 whitespace-pre-wrap">{{ $reply->content }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="mt-6">
                    {{ $replies->links() }}
                </div>
            @endif
        </div>

        <!-- Reply Form -->
        @auth
            @if(!$thread->is_locked)
                <div class="elden-card p-8">
                    <h3 class="text-xl font-bold text-amber-400 mb-6">Post a Reply</h3>

                    <form method="POST" action="{{ route('forum.replies.store', $thread) }}">
                        @csrf

                        <div class="mb-6">
                            <textarea id="content"
                                      name="content"
                                      rows="6"
                                      required
                                      maxlength="5000"
                                      class="elden-input w-full px-4 py-2"
                                      placeholder="Write your reply...">{{ old('content') }}</textarea>
                            @error('content')
                                <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex items-center justify-end">
                            <button type="submit" class="elden-button">
                                Post Reply
                            </button>
                        </div>
                    </form>
                </div>
            @else
                <div class="elden-card p-8 text-center">
                    <p class="text-slate-400">🔒 This thread is locked. No new replies can be posted.</p>
                </div>
            @endif
        @else
            <div class="elden-card p-8 text-center">
                <p class="text-slate-400 mb-4">You must be logged in to reply to this thread.</p>
                <a href="{{ route('login') }}" class="elden-button">
                    Log In
                </a>
            </div>
        @endauth
    </div>
</x-app-layout>
