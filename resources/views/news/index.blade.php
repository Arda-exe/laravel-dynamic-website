<x-app-layout>
    <x-slot name="header">
        News & Updates
    </x-slot>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        @if($articles->isEmpty())
            <div class="text-center py-12">
                <p class="text-gray-400 text-lg">No news articles available yet.</p>
            </div>
        @else
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($articles as $article)
                    <x-news-card :article="$article" />
                @endforeach
            </div>

            <div class="mt-8">
                {{ $articles->links() }}
            </div>
        @endif
    </div>
</x-app-layout>
