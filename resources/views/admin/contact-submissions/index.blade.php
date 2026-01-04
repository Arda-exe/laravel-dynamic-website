<x-admin-layout>
    <x-slot name="header">
        Contact Submissions
    </x-slot>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        @if($submissions->isEmpty())
            <div class="elden-card p-12 text-center">
                <p class="text-slate-400 text-lg">No contact submissions yet.</p>
            </div>
        @else
            <div class="elden-card overflow-hidden">
                <table class="min-w-full divide-y divide-amber-900/20">
                    <thead class="bg-slate-900/50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-amber-400 uppercase tracking-wider">
                                Status
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-amber-400 uppercase tracking-wider">
                                Name
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-amber-400 uppercase tracking-wider">
                                Email
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-amber-400 uppercase tracking-wider">
                                Subject
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-amber-400 uppercase tracking-wider">
                                Date
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-amber-400 uppercase tracking-wider">
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-amber-900/10">
                        @foreach($submissions as $submission)
                            <tr class="hover:bg-slate-800/30 transition-colors {{ $submission->is_read ? 'opacity-60' : '' }}">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    @if($submission->is_read)
                                        <span class="px-2 py-1 text-xs font-semibold rounded-full bg-slate-700 text-slate-300">
                                            Read
                                        </span>
                                    @else
                                        <span class="px-2 py-1 text-xs font-semibold rounded-full bg-amber-600 text-slate-950">
                                            Unread
                                        </span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-slate-300">
                                    {{ $submission->name }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-slate-400">
                                    {{ $submission->email }}
                                </td>
                                <td class="px-6 py-4 text-sm text-slate-300">
                                    {{ Str::limit($submission->subject, 50) }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-slate-400">
                                    {{ $submission->created_at->format('M d, Y') }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm">
                                    <div class="flex items-center gap-2">
                                        <a href="{{ route('admin.contact-submissions.show', $submission) }}"
                                           class="text-amber-400 hover:text-amber-300">
                                            View
                                        </a>
                                        <form method="POST" action="{{ route('admin.contact-submissions.destroy', $submission) }}"
                                              onsubmit="return confirm('Are you sure you want to delete this submission?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-400 hover:text-red-300">
                                                Delete
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="mt-6">
                {{ $submissions->links() }}
            </div>
        @endif
    </div>
</x-admin-layout>
