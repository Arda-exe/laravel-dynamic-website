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
        <div class="w-full h-56 bg-gradient-to-br from-slate-800 to-slate-900 flex items-center justify-center relative overflow-hidden">
            <div class="absolute inset-0 opacity-5" style="background-image: url('data:image/svg+xml,%3Csvg width=\'60\' height=\'60\' viewBox=\'0 0 60 60\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cg fill=\'none\' fill-rule=\'evenodd\'%3E%3Cg fill=\'%23ffffff\' fill-opacity=\'1\'%3E%3Cpath d=\'M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z\'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');"></div>
            <span class="text-amber-900/40 text-xl font-bold" style="font-family: 'Cinzel', serif;">Elden Ring</span>
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
                {{ $article->user->username ?? $article->user->name }}
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
