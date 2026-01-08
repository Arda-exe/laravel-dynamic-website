@props(['comment'])

<div class="flex gap-4 p-4 bg-slate-900/30 rounded-lg border border-amber-900/20">
    <div class="flex-shrink-0">
        <x-user-avatar :user="$comment->user" size="md" />
    </div>

    <div class="flex-grow">
        <div class="flex items-center justify-between mb-2">
            <div>
                <span class="font-semibold text-amber-400">
                    {{ $comment->user->name }}
                </span>
                <span class="text-slate-500 text-sm ml-2">
                    {{ $comment->created_at->diffForHumans() }}
                </span>
            </div>

            @auth
                @if(auth()->id() === $comment->user_id || auth()->user()->isAdmin())
                    <form method="POST" action="{{ route('comments.destroy', $comment) }}" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                                onclick="return confirm('Are you sure you want to delete this comment?')"
                                class="text-red-400 hover:text-red-300 text-sm transition-colors">
                            Delete
                        </button>
                    </form>
                @endif
            @endauth
        </div>

        <p class="text-slate-300 leading-relaxed">
            {{ $comment->content }}
        </p>
    </div>
</div>
