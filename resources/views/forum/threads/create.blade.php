<x-app-layout>
    <x-slot name="header">
        Create New Thread
    </x-slot>

    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="elden-card p-8">
            <form method="POST" action="{{ route('forum.threads.store') }}">
                @csrf

                <!-- Category -->
                <div class="mb-6">
                    <label for="forum_category_id" class="block text-sm font-medium text-amber-400 mb-2">
                        Category <span class="text-red-400">*</span>
                    </label>
                    <select id="forum_category_id"
                            name="forum_category_id"
                            required
                            class="elden-input w-full px-4 py-2">
                        <option value="">Select a category</option>
                        @foreach($categories as $cat)
                            <option value="{{ $cat->id }}" {{ old('forum_category_id', $category?->id) == $cat->id ? 'selected' : '' }}>
                                {{ $cat->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('forum_category_id')
                        <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Title -->
                <div class="mb-6">
                    <label for="title" class="block text-sm font-medium text-amber-400 mb-2">
                        Thread Title <span class="text-red-400">*</span>
                    </label>
                    <input type="text"
                           id="title"
                           name="title"
                           value="{{ old('title') }}"
                           required
                           maxlength="255"
                           class="elden-input w-full px-4 py-2"
                           placeholder="What's your topic?">
                    @error('title')
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
                              maxlength="10000"
                              class="elden-input w-full px-4 py-2"
                              placeholder="Share your thoughts...">{{ old('content') }}</textarea>
                    @error('content')
                        <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex items-center justify-end gap-4">
                    <a href="{{ route('forum.index') }}" class="text-slate-400 hover:text-slate-300">
                        Cancel
                    </a>
                    <button type="submit" class="elden-button">
                        Create Thread
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
