<x-app-layout>
    <x-slot name="header">
        {{ $article->title }}
    </x-slot>

    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <article class="bg-gray-800 rounded-lg shadow-lg overflow-hidden border border-yellow-600">
            @if($article->image)
                <img src="{{ asset('storage/' . $article->image) }}"
                     alt="{{ $article->title }}"
                     class="w-full h-96 object-cover">
            @endif

            <div class="p-8">
                <div class="flex items-center mb-6">
                    <x-user-avatar :user="$article->user" size="md" />
                    <div class="ml-4">
                        <p class="text-gray-300 font-medium">
                            {{ $article->user->username ?? $article->user->name }}
                        </p>
                        <p class="text-gray-400 text-sm">
                            {{ $article->published_at->format('F j, Y \a\t g:i A') }}
                        </p>
                    </div>
                </div>

                <div class="prose prose-invert prose-yellow max-w-none">
                    <div class="text-gray-300 leading-relaxed">
                        {!! nl2br(e($article->content)) !!}
                    </div>
                </div>

                <div class="mt-8 pt-6 border-t border-gray-700">
                    <a href="{{ route('news.index') }}"
                       class="inline-block bg-gray-700 hover:bg-gray-600 text-yellow-500 font-bold py-2 px-4 rounded transition-colors">
                        ← Back to News
                    </a>
                </div>
            </div>
        </article>
    </div>
</x-app-layout>
