<x-app-layout>
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="elden-card p-8">
            <div class="flex items-start gap-8">
                <div class="flex-shrink-0">
                    <x-user-avatar :user="$user" size="xl" />
                </div>

                <div class="flex-grow">
                    <h2 class="text-3xl font-bold elden-title mb-2">
                        {{ $user->name }}
                    </h2>

                    @if($user->bio)
                        <div class="mb-6">
                            <h3 class="text-sm font-medium text-amber-400 mb-2">Bio</h3>
                            <p class="text-slate-300 whitespace-pre-wrap">{{ $user->bio }}</p>
                        </div>
                    @endif

                    <div class="space-y-3 text-sm">
                        @if($user->birthday)
                            <div class="flex items-center gap-2">
                                <span class="text-amber-400">Birthday:</span>
                                <span class="text-slate-300">{{ \Carbon\Carbon::parse($user->birthday)->format('F d, Y') }}</span>
                            </div>
                        @endif

                        <div class="flex items-center gap-2">
                            <span class="text-amber-400">Joined:</span>
                            <span class="text-slate-300">{{ $user->created_at->format('F Y') }}</span>
                        </div>
                    </div>

                    @auth
                        @if(auth()->id() === $user->id)
                            <div class="mt-6">
                                <a href="{{ route('profile.edit') }}" class="elden-button inline-block">
                                    Edit Profile
                                </a>
                            </div>
                        @endif
                    @endauth
                </div>
            </div>

            <div class="mt-8 pt-8 border-t border-amber-900/20">
                <h3 class="text-xl font-bold text-amber-400 mb-4">Recent Activity</h3>

                @php
                    $recentNews = $user->newsArticles()->latest()->take(3)->get();
                    $recentComments = $user->comments()->with('newsArticle')->latest()->take(5)->get();
                @endphp

                @if($recentNews->isNotEmpty())
                    <div class="mb-6">
                        <h4 class="text-sm font-medium text-amber-400 mb-3">Recent News Articles</h4>
                        <div class="space-y-2">
                            @foreach($recentNews as $article)
                                <a href="{{ route('news.show', $article->slug) }}"
                                   class="block p-3 rounded bg-slate-900/30 hover:bg-slate-800/50 transition-colors border border-amber-900/20">
                                    <p class="text-slate-200 font-medium">{{ $article->title }}</p>
                                    <p class="text-xs text-slate-400 mt-1">{{ $article->created_at->diffForHumans() }}</p>
                                </a>
                            @endforeach
                        </div>
                    </div>
                @endif

                @if($recentComments->isNotEmpty())
                    <div>
                        <h4 class="text-sm font-medium text-amber-400 mb-3">Recent Comments</h4>
                        <div class="space-y-2">
                            @foreach($recentComments as $comment)
                                <a href="{{ route('news.show', $comment->newsArticle->slug) }}#comment-{{ $comment->id }}"
                                   class="block p-3 rounded bg-slate-900/30 hover:bg-slate-800/50 transition-colors border border-amber-900/20">
                                    <p class="text-slate-300 text-sm">{{ Str::limit($comment->content, 100) }}</p>
                                    <p class="text-xs text-slate-400 mt-1">
                                        On <span class="text-amber-400">{{ $comment->newsArticle->title }}</span> · {{ $comment->created_at->diffForHumans() }}
                                    </p>
                                </a>
                            @endforeach
                        </div>
                    </div>
                @endif

                @if($recentNews->isEmpty() && $recentComments->isEmpty())
                    <p class="text-slate-400 text-center py-8">No recent activity</p>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
