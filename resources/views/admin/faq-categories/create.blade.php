<x-admin-layout>
    <x-slot name="header">
        Create FAQ Category
    </x-slot>

    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="elden-card p-8">
            <form method="POST" action="{{ route('admin.faq-categories.store') }}">
                @csrf

                <!-- Name -->
                <div class="mb-6">
                    <label for="name" class="block text-sm font-medium text-amber-400 mb-2">
                        Category Name <span class="text-red-400">*</span>
                    </label>
                    <input type="text"
                           id="name"
                           name="name"
                           value="{{ old('name') }}"
                           required
                           maxlength="255"
                           class="elden-input w-full px-4 py-2"
                           placeholder="Enter category name">
                    <p class="mt-1 text-xs text-slate-400">
                        A slug will be automatically generated from this name
                    </p>
                    @error('name')
                        <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Description -->
                <div class="mb-6">
                    <label for="description" class="block text-sm font-medium text-amber-400 mb-2">
                        Description
                    </label>
                    <textarea id="description"
                              name="description"
                              rows="4"
                              maxlength="1000"
                              class="elden-input w-full px-4 py-2"
                              placeholder="Optional description for this category">{{ old('description') }}</textarea>
                    <p class="mt-1 text-xs text-slate-400">
                        Maximum 1000 characters
                    </p>
                    @error('description')
                        <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Order -->
                <div class="mb-6">
                    <label for="order" class="block text-sm font-medium text-amber-400 mb-2">
                        Display Order <span class="text-red-400">*</span>
                    </label>
                    <input type="number"
                           id="order"
                           name="order"
                           value="{{ old('order', $nextOrder) }}"
                           required
                           min="0"
                           class="elden-input w-full px-4 py-2"
                           placeholder="0">
                    <p class="mt-1 text-xs text-slate-400">
                        Lower numbers appear first. Default is {{ $nextOrder }}.
                    </p>
                    @error('order')
                        <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Submit Buttons -->
                <div class="flex items-center justify-between">
                    <a href="{{ route('admin.faq-categories.index') }}"
                       class="bg-slate-700 hover:bg-slate-600 text-amber-400 font-bold py-2 px-6 rounded border-2 border-amber-900/50 transition duration-300">
                        Cancel
                    </a>
                    <button type="submit" class="elden-button">
                        Create Category
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-admin-layout>
