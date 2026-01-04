<x-admin-layout>
    <x-slot name="header">
        Contact Submission Details
    </x-slot>

    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="elden-card p-8">
            <div class="mb-6">
                <a href="{{ route('admin.contact-submissions.index') }}" class="text-amber-400 hover:text-amber-300">
                    ← Back to submissions
                </a>
            </div>

            <div class="space-y-6">
                <div>
                    <h3 class="text-sm font-medium text-amber-400 mb-2">Name</h3>
                    <p class="text-slate-200">{{ $contactSubmission->name }}</p>
                </div>

                <div>
                    <h3 class="text-sm font-medium text-amber-400 mb-2">Email</h3>
                    <p class="text-slate-200">
                        <a href="mailto:{{ $contactSubmission->email }}" class="hover:text-amber-400">
                            {{ $contactSubmission->email }}
                        </a>
                    </p>
                </div>

                <div>
                    <h3 class="text-sm font-medium text-amber-400 mb-2">Subject</h3>
                    <p class="text-slate-200">{{ $contactSubmission->subject }}</p>
                </div>

                <div>
                    <h3 class="text-sm font-medium text-amber-400 mb-2">Message</h3>
                    <div class="bg-slate-900/50 rounded-lg p-4 border border-amber-900/20">
                        <p class="text-slate-300 whitespace-pre-wrap">{{ $contactSubmission->message }}</p>
                    </div>
                </div>

                <div>
                    <h3 class="text-sm font-medium text-amber-400 mb-2">Submitted</h3>
                    <p class="text-slate-400">
                        {{ $contactSubmission->created_at->format('F d, Y \a\t g:i A') }}
                    </p>
                </div>

                <div class="flex items-center gap-4 pt-4 border-t border-amber-900/20">
                    <form method="POST" action="{{ route('admin.contact-submissions.destroy', $contactSubmission) }}"
                          onsubmit="return confirm('Are you sure you want to delete this submission?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-6 rounded-md">
                            Delete Submission
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
