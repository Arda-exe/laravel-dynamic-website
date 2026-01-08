<x-admin-layout>
    <x-slot name="header">
        Edit FAQ Category
    </x-slot>

    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="elden-card p-8">
            <form method="POST" action="{{ route('admin.faq-categories.update', $faqCategory) }}">
                @csrf
                @method('PATCH')

                <!-- Name -->
                <div class="mb-6">
                    <label for="name" class="block text-sm font-medium text-amber-400 mb-2">
                        Category Name <span class="text-red-400">*</span>
                    </label>
                    <input type="text"
                           id="name"
                           name="name"
                           value="{{ old('name', $faqCategory->name) }}"
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
                              placeholder="Optional description for this category">{{ old('description', $faqCategory->description) }}</textarea>
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
                           value="{{ old('order', $faqCategory->order) }}"
                           required
                           min="0"
                           class="elden-input w-full px-4 py-2"
                           placeholder="0">
                    <p class="mt-1 text-xs text-slate-400">
                        Lower numbers appear first
                    </p>
                    @error('order')
                        <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Category Info -->
                @if($faqCategory->faqs_count > 0)
                    <div class="mb-6 p-4 bg-blue-900/20 rounded border border-blue-600/30">
                        <div class="flex items-start">
                            <svg class="w-5 h-5 text-blue-400 mt-0.5 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <div>
                                <h3 class="text-sm font-medium text-blue-300 mb-1">Category Contains FAQs</h3>
                                <p class="text-xs text-blue-200/70">
                                    This category contains {{ $faqCategory->faqs_count }} {{ Str::plural('FAQ', $faqCategory->faqs_count) }}. You cannot delete this category until all FAQs are removed or reassigned.
                                </p>
                            </div>
                        </div>
                    </div>
                @endif

                <!-- Submit Buttons -->
                <div class="flex items-center justify-between">
                    <a href="{{ route('admin.faq-categories.index') }}"
                       class="bg-slate-700 hover:bg-slate-600 text-amber-400 font-bold py-2 px-6 rounded border-2 border-amber-900/50 transition duration-300">
                        Cancel
                    </a>
                    <button type="submit" class="elden-button">
                        Update Category
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-admin-layout>
