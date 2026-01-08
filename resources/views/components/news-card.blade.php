@props(['article'])

<article class="elden-card overflow-hidden group flex flex-col h-full">
    @if($article->image)
        <div class="relative overflow-hidden h-56">
            <img src="{{ asset('storage/' . $article->image) }}"
                 alt="{{ $article->title }}"
                 class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
            <div class="absolute inset-0 bg-gradient-to-t from-slate-950 via-transparent to-transparent"></div>
        </div>
    @else
        <div class="relative overflow-hidden h-56">
            <img src="{{ asset('images/default.jpg') }}"
                 alt="{{ $article->title }}"
                 class="w-full h-full object-cover">
        </div>
    @endif

    <div class="p-6 flex-grow">
        <h3 class="text-2xl font-bold mb-3 elden-text-gold" style="font-family: 'Cinzel', serif;">
            <a href="{{ route('news.show', $article->slug) }}" class="hover:text-amber-300 transition-colors">
                {{ $article->title }}
            </a>
        </h3>

        <div class="flex items-center gap-3 mb-4 text-sm text-slate-400">
            <span class="flex items-center gap-1">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                </svg>
                {{ $article->user->name }}
            </span>
            <span>•</span>
            <span class="flex items-center gap-1">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                </svg>
                {{ $article->published_at->format('M d, Y') }}
            </span>
        </div>

        <p class="text-slate-300 leading-relaxed line-clamp-3">
            {{ $article->excerpt }}
        </p>
    </div>

    <div class="p-6 pt-0">
        <a href="{{ route('news.show', $article->slug) }}" class="elden-button inline-flex items-center gap-2">
            <span>Read More</span>
            <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
            </svg>
        </a>
    </div>
</article>
