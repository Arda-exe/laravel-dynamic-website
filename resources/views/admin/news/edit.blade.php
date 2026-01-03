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

                <!-- Published Status -->
                <div class="mb-6">
                    <label class="flex items-center">
                        <input type="checkbox"
                               name="is_published"
                               value="1"
                               {{ old('is_published', $article->is_published) ? 'checked' : '' }}
                               class="rounded border-amber-900/30 bg-slate-900/50 text-amber-600 focus:ring-amber-600 focus:ring-offset-slate-950">
                        <span class="ml-2 text-sm text-slate-300">Published</span>
                    </label>
                </div>

                <!-- Buttons -->
                <div class="flex items-center justify-between pt-4 border-t border-amber-900/20">
                    <a href="{{ route('admin.news.index') }}"
                       class="text-slate-400 hover:text-amber-400 transition-colors">
                        Cancel
                    </a>
                    <button type="submit" class="elden-button">
                        Update Article
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-admin-layout>
