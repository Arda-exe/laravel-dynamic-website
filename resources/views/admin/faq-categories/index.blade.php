<x-admin-layout>
    <x-slot name="header">
        FAQ Categories
    </x-slot>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="mb-6 flex justify-between items-center">
            <h2 class="text-2xl font-bold text-amber-400">All Categories</h2>
            <a href="{{ route('admin.faq-categories.create') }}" class="elden-button">
                Create New Category
            </a>
        </div>

        <div class="bg-slate-900/50 border border-amber-900/30 rounded-lg overflow-hidden">
            <table class="min-w-full divide-y divide-amber-900/20">
                <thead class="bg-slate-950/50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-amber-400 uppercase tracking-wider">
                            Name
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-amber-400 uppercase tracking-wider">
                            Slug
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-amber-400 uppercase tracking-wider">
                            FAQs Count
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
                    @forelse($categories as $category)
                        <tr class="hover:bg-slate-800/30 transition-colors">
                            <td class="px-6 py-4">
                                <div class="text-sm font-medium text-slate-200">
                                    {{ $category->name }}
                                </div>
                                @if($category->description)
                                    <div class="text-xs text-slate-400 mt-1">
                                        {{ Str::limit($category->description, 60) }}
                                    </div>
                                @endif
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-slate-400">
                                    {{ $category->slug }}
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-900/30 text-blue-400">
                                    {{ $category->faqs_count }} {{ Str::plural('FAQ', $category->faqs_count) }}
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-slate-400">
                                {{ $category->order }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <a href="{{ route('admin.faq-categories.edit', $category) }}"
                                   class="text-blue-400 hover:text-blue-300 mr-3">
                                    Edit
                                </a>
                                <form method="POST"
                                      action="{{ route('admin.faq-categories.destroy', $category) }}"
                                      class="inline"
                                      onsubmit="return confirm('Are you sure you want to delete this category?{{ $category->faqs_count > 0 ? ' It contains ' . $category->faqs_count . ' FAQ(s).' : '' }}');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-400 hover:text-red-300">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-4 text-center text-slate-400">
                                No FAQ categories found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-admin-layout>
