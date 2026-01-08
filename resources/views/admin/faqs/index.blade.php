<x-admin-layout>
    <x-slot name="header">
        FAQ Questions
    </x-slot>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="mb-6 flex justify-between items-center">
            <h2 class="text-2xl font-bold text-amber-400">All FAQs</h2>
            <a href="{{ route('admin.faqs.create') }}" class="elden-button">
                Create New FAQ
            </a>
        </div>

        @forelse($faqs as $categoryId => $categoryFaqs)
            @php
                $category = $categoryFaqs->first()->faqCategory;
            @endphp
            <div class="mb-6 bg-slate-900/50 border border-amber-900/30 rounded-lg overflow-hidden">
                <div class="bg-slate-950/50 px-6 py-4 border-b border-amber-900/20">
                    <h3 class="text-lg font-semibold text-amber-400">{{ $category->name }}</h3>
                    @if($category->description)
                        <p class="text-sm text-slate-400 mt-1">{{ $category->description }}</p>
                    @endif
                </div>

                <table class="min-w-full divide-y divide-amber-900/20">
                    <thead class="bg-slate-950/30">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-amber-400 uppercase tracking-wider">
                                Question
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-amber-400 uppercase tracking-wider">
                                Answer Preview
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-amber-400 uppercase tracking-wider">
                                Order
                            </th>
                            <th class="px-6 py-3 text-right text-xs font-medium text-amber-400 uppercase tracking-wider">
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-amber-900/10">
                        @foreach($categoryFaqs->sortBy('order') as $faq)
                            <tr class="hover:bg-slate-800/30 transition-colors">
                                <td class="px-6 py-4">
                                    <div class="text-sm font-medium text-slate-200">
                                        {{ Str::limit($faq->question, 80) }}
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-xs text-slate-400">
                                        {{ Str::limit(strip_tags($faq->answer), 100) }}
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-slate-400">
                                    {{ $faq->order }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <a href="{{ route('admin.faqs.edit', $faq) }}"
                                       class="text-blue-400 hover:text-blue-300 mr-3">
                                        Edit
                                    </a>
                                    <form method="POST"
                                          action="{{ route('admin.faqs.destroy', $faq) }}"
                                          class="inline"
                                          onsubmit="return confirm('Are you sure you want to delete this FAQ?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-400 hover:text-red-300">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @empty
            <div class="bg-slate-900/50 border border-amber-900/30 rounded-lg p-8 text-center">
                <p class="text-slate-400">No FAQs found. Create your first FAQ to get started.</p>
            </div>
        @endforelse
    </div>
</x-admin-layout>
