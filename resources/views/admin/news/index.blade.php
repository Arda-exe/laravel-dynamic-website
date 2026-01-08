<x-admin-layout>
    <x-slot name="header">
        Manage News Articles
    </x-slot>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="mb-6 flex justify-between items-center">
            <h2 class="text-2xl font-bold text-amber-400">All Articles</h2>
            <a href="{{ route('admin.news.create') }}" class="elden-button">
                Create New Article
            </a>
        </div>

        <div class="bg-slate-900/50 border border-amber-900/30 rounded-lg overflow-hidden">
            <table class="min-w-full divide-y divide-amber-900/20">
                <thead class="bg-slate-950/50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-amber-400 uppercase tracking-wider">
                            Title
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-amber-400 uppercase tracking-wider">
                            Author
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-amber-400 uppercase tracking-wider">
                            Status
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-amber-400 uppercase tracking-wider">
                            Published
                        </th>
                        <th class="px-6 py-3 text-right text-xs font-medium text-amber-400 uppercase tracking-wider">
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-amber-900/10">
                    @forelse($articles as $article)
                        <tr class="hover:bg-slate-800/30 transition-colors">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm font-medium text-slate-200">
                                    {{ $article->title }}
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-slate-400">
                                    {{ $article->user->name }}
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                @if($article->published_at)
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-900/30 text-green-400">
                                        Published
                                    </span>
                                @else
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-700/30 text-gray-400">
                                        Draft
                                    </span>
                                @endif
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-slate-400">
                                {{ $article->published_at?->format('M d, Y') ?? 'N/A' }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                @if($article->published_at)
                                    <a href="{{ route('news.show', $article->slug) }}"
                                       class="text-amber-400 hover:text-amber-300 mr-3">
                                        View
                                    </a>
                                @else
                                    <span class="text-slate-600 mr-3 cursor-not-allowed">View</span>
                                @endif
                                <a href="{{ route('admin.news.edit', $article) }}"
                                   class="text-blue-400 hover:text-blue-300 mr-3">
                                    Edit
                                </a>
                                <form method="POST"
                                      action="{{ route('admin.news.destroy', $article) }}"
                                      class="inline"
                                      onsubmit="return confirm('Are you sure you want to delete this article?');">
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
                                No articles found. Create your first article!
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-6">
            {{ $articles->links() }}
        </div>
    </div>
</x-admin-layout>
