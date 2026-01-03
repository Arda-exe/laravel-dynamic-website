@props(['article'])

<div class="bg-gray-800 rounded-lg shadow-lg overflow-hidden border border-yellow-600 hover:border-yellow-500 transition-colors">
    @if($article->image)
        <img src="{{ asset('storage/' . $article->image) }}"
             alt="{{ $article->title }}"
             class="w-full h-48 object-cover">
    @else
        <div class="w-full h-48 bg-gray-700 flex items-center justify-center">
            <span class="text-gray-500 text-xl">No Image</span>
        </div>
    @endif

    <div class="p-6">
        <h3 class="text-xl font-bold text-yellow-500 mb-2" style="font-family: 'Cinzel', serif;">
            <a href="{{ route('news.show', $article->slug) }}" class="hover:text-yellow-400">
                {{ $article->title }}
            </a>
        </h3>

        <p class="text-gray-400 text-sm mb-3">
            By {{ $article->user->username ?? $article->user->name }} •
            {{ $article->published_at->format('M d, Y') }}
        </p>

        <p class="text-gray-300 mb-4">
            {{ $article->excerpt }}
        </p>

        <a href="{{ route('news.show', $article->slug) }}"
           class="inline-block bg-yellow-600 hover:bg-yellow-700 text-gray-900 font-bold py-2 px-4 rounded transition-colors">
            Read More
        </a>
    </div>
</div>
