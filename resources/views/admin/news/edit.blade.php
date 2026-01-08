<x-admin-layout>
    <x-slot name="header">
        Edit News Article
    </x-slot>

    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="elden-card p-8">
            <form method="POST" action="{{ route('admin.news.update', $article) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <!-- Title -->
                <div class="mb-6">
                    <label for="title" class="block text-sm font-medium text-amber-400 mb-2">
                        Title <span class="text-red-400">*</span>
                    </label>
                    <input type="text"
                           id="title"
                           name="title"
                           value="{{ old('title', $article->title) }}"
                           required
                           maxlength="255"
                           class="elden-input w-full px-4 py-2"
                           placeholder="Enter article title">
                    @error('title')
                        <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Excerpt -->
                <div class="mb-6">
                    <label for="excerpt" class="block text-sm font-medium text-amber-400 mb-2">
                        Excerpt <span class="text-red-400">*</span>
                    </label>
                    <textarea id="excerpt"
                              name="excerpt"
                              rows="3"
                              required
                              maxlength="500"
                              class="elden-input w-full px-4 py-2"
                              placeholder="Brief summary of the article">{{ old('excerpt', $article->excerpt) }}</textarea>
                    @error('excerpt')
                        <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Content -->
                <div class="mb-6">
                    <label for="content" class="block text-sm font-medium text-amber-400 mb-2">
                        Content <span class="text-red-400">*</span>
                    </label>
                    <textarea id="content"
                              name="content"
                              rows="12"
                              required
                              class="elden-input w-full px-4 py-2"
                              placeholder="Full article content">{{ old('content', $article->content) }}</textarea>
                    @error('content')
                        <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Current Image -->
                @if($article->image)
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-amber-400 mb-2">
                            Current Image
                        </label>
                        <img src="{{ asset('storage/' . $article->image) }}"
                             alt="{{ $article->title }}"
                             class="h-32 w-auto rounded border border-amber-900/30">
                    </div>
                @endif

                <!-- Image Upload -->
                <div class="mb-6">
                    <label for="image" class="block text-sm font-medium text-amber-400 mb-2">
                        {{ $article->image ? 'Replace Image' : 'Featured Image' }}
                    </label>
                    <input type="file"
                           id="image"
                           name="image"
                           accept="image/*"
                           class="elden-input w-full px-4 py-2">
                    <p class="mt-1 text-xs text-slate-400">Recommended: 1200x600px, Max: 2MB</p>
                    @error('image')
                        <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Current Status Display -->
                <div class="mb-6 p-4 bg-slate-900/50 border border-amber-900/20 rounded">
                    <p class="text-sm text-slate-400">
                        Current Status:
                        @if($article->published_at)
                            <span class="ml-2 px-2 py-1 text-xs font-semibold rounded bg-green-900/30 text-green-400">Published</span>
                            <span class="ml-2 text-xs text-slate-500">on {{ $article->published_at->format('M d, Y') }}</span>
                        @else
                            <span class="ml-2 px-2 py-1 text-xs font-semibold rounded bg-gray-700/30 text-gray-400">Draft</span>
                        @endif
                    </p>
                </div>

                <!-- Hidden field for publish status -->
                <input type="hidden" name="is_published" id="is_published" value="{{ $article->published_at ? '1' : '0' }}">

                <!-- Buttons -->
                <div class="flex items-center justify-between pt-4 border-t border-amber-900/20">
                    <a href="{{ route('admin.news.index') }}"
                       class="text-slate-400 hover:text-amber-400 transition-colors">
                        Cancel
                    </a>
                    <div class="flex gap-3">
                        <button type="submit"
                                onclick="document.getElementById('is_published').value='0'"
                                class="bg-slate-700 hover:bg-slate-600 text-slate-200 font-bold py-2 px-6 rounded transition duration-300">
                            Save as Draft
                        </button>
                        <button type="submit"
                                onclick="document.getElementById('is_published').value='1'"
                                class="elden-button">
                            {{ $article->published_at ? 'Update & Keep Published' : 'Publish' }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-admin-layout>
