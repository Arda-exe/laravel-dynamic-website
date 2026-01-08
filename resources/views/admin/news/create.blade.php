<x-admin-layout>
    <x-slot name="header">
        Create News Article
    </x-slot>

    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="elden-card p-8">
            <form method="POST" action="{{ route('admin.news.store') }}" enctype="multipart/form-data">
                @csrf

                <!-- Title -->
                <div class="mb-6">
                    <label for="title" class="block text-sm font-medium text-amber-400 mb-2">
                        Title <span class="text-red-400">*</span>
                    </label>
                    <input type="text"
                           id="title"
                           name="title"
                           value="{{ old('title') }}"
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
                              placeholder="Brief summary of the article">{{ old('excerpt') }}</textarea>
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
                              placeholder="Full article content">{{ old('content') }}</textarea>
                    @error('content')
                        <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Image -->
                <div class="mb-6">
                    <label for="image" class="block text-sm font-medium text-amber-400 mb-2">
                        Featured Image
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

                <!-- Hidden field for publish status -->
                <input type="hidden" name="is_published" id="is_published" value="0">

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
                            Publish
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-admin-layout>
