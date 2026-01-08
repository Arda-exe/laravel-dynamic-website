<x-admin-layout>
    <x-slot name="header">
        Edit FAQ
    </x-slot>

    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="elden-card p-8">
            <form method="POST" action="{{ route('admin.faqs.update', $faq) }}">
                @csrf
                @method('PATCH')

                <!-- Category -->
                <div class="mb-6">
                    <label for="faq_category_id" class="block text-sm font-medium text-amber-400 mb-2">
                        Category <span class="text-red-400">*</span>
                    </label>
                    <select id="faq_category_id"
                            name="faq_category_id"
                            required
                            class="elden-input w-full px-4 py-2">
                        <option value="">Select a category</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ old('faq_category_id', $faq->faq_category_id) == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('faq_category_id')
                        <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Question -->
                <div class="mb-6">
                    <label for="question" class="block text-sm font-medium text-amber-400 mb-2">
                        Question <span class="text-red-400">*</span>
                    </label>
                    <input type="text"
                           id="question"
                           name="question"
                           value="{{ old('question', $faq->question) }}"
                           required
                           maxlength="500"
                           class="elden-input w-full px-4 py-2"
                           placeholder="Enter the question">
                    <p class="mt-1 text-xs text-slate-400">
                        Maximum 500 characters
                    </p>
                    @error('question')
                        <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Answer -->
                <div class="mb-6">
                    <label for="answer" class="block text-sm font-medium text-amber-400 mb-2">
                        Answer <span class="text-red-400">*</span>
                    </label>
                    <textarea id="answer"
                              name="answer"
                              rows="8"
                              required
                              class="elden-input w-full px-4 py-2"
                              placeholder="Enter the answer">{{ old('answer', $faq->answer) }}</textarea>
                    <p class="mt-1 text-xs text-slate-400">
                        You can use plain text or basic formatting
                    </p>
                    @error('answer')
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
                           value="{{ old('order', $faq->order) }}"
                           required
                           min="0"
                           class="elden-input w-full px-4 py-2"
                           placeholder="0">
                    <p class="mt-1 text-xs text-slate-400">
                        Lower numbers appear first within the category
                    </p>
                    @error('order')
                        <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- FAQ Info -->
                <div class="mb-6 p-4 bg-slate-800/30 rounded border border-amber-900/20">
                    <h3 class="text-sm font-medium text-amber-400 mb-2">FAQ Information</h3>
                    <div class="space-y-1 text-sm text-slate-400">
                        <p><span class="text-amber-400">Created:</span> {{ $faq->created_at->format('F d, Y \a\t g:i A') }}</p>
                        <p><span class="text-amber-400">Last Updated:</span> {{ $faq->updated_at->format('F d, Y \a\t g:i A') }}</p>
                    </div>
                </div>

                <!-- Submit Buttons -->
                <div class="flex items-center justify-between">
                    <a href="{{ route('admin.faqs.index') }}"
                       class="bg-slate-700 hover:bg-slate-600 text-amber-400 font-bold py-2 px-6 rounded border-2 border-amber-900/50 transition duration-300">
                        Cancel
                    </a>
                    <button type="submit" class="elden-button">
                        Update FAQ
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-admin-layout>
