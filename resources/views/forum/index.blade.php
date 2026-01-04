<x-app-layout>
    <x-slot name="header">
        Forum
    </x-slot>

    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
        @if($categories->isEmpty())
            <div class="elden-card p-12 text-center">
                <p class="text-slate-400 text-lg">No forum categories available yet.</p>
            </div>
        @else
            <div class="space-y-4">
                @foreach($categories as $category)
                    <div class="elden-card p-6 hover:shadow-2xl transition-shadow">
                        <a href="{{ route('forum.category.show', $category->slug) }}" class="block">
                            <div class="flex items-start justify-between">
                                <div class="flex-grow">
                                    <h2 class="text-2xl font-bold text-amber-400 mb-2" style="font-family: 'Cinzel', serif;">
                                        {{ $category->name }}
                                    </h2>

                                    @if($category->description)
                                        <p class="text-slate-400 mb-3">
                                            {{ $category->description }}
                                        </p>
                                    @endif

                                    <div class="flex items-center gap-4 text-sm text-slate-500">
                                        <span>{{ $category->threads_count }} {{ Str::plural('thread', $category->threads_count) }}</span>
                                    </div>
                                </div>

                                <div class="flex-shrink-0 ml-6">
                                    <svg class="w-6 h-6 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                    </svg>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</x-app-layout>
