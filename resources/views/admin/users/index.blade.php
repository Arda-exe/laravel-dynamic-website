<x-admin-layout>
    <x-slot name="header">
        Manage Users
    </x-slot>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="mb-6 flex justify-between items-center">
            <h2 class="text-2xl font-bold text-amber-400">All Users</h2>
            <a href="{{ route('admin.users.create') }}" class="elden-button">
                Create New User
            </a>
        </div>

        <!-- Search Bar -->
        <div class="mb-6">
            <form method="GET" action="{{ route('admin.users.index') }}" class="flex gap-3">
                <div class="flex-grow">
                    <input 
                        type="text" 
                        name="search" 
                        value="{{ $search ?? '' }}" 
                        placeholder="Search by name or email..." 
                        class="elden-input w-full px-4 py-2"
                    >
                </div>
                <button type="submit" class="elden-button px-6">
                    Search
                </button>
                @if($search)
                    <a href="{{ route('admin.users.index') }}" class="px-6 py-2 bg-slate-700 text-slate-200 rounded-lg hover:bg-slate-600 transition-colors">
                        Clear
                    </a>
                @endif
            </form>
        </div>

        <div class="bg-slate-900/50 border border-amber-900/30 rounded-lg overflow-hidden">
            <table class="min-w-full divide-y divide-amber-900/20">
                <thead class="bg-slate-950/50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-amber-400 uppercase tracking-wider">
                            User
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-amber-400 uppercase tracking-wider">
                            Email
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-amber-400 uppercase tracking-wider">
                            Role
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-amber-400 uppercase tracking-wider">
                            Joined
                        </th>
                        <th class="px-6 py-3 text-right text-xs font-medium text-amber-400 uppercase tracking-wider">
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-amber-900/10">
                    @forelse($users as $user)
                        <tr class="hover:bg-slate-800/30 transition-colors">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <x-user-avatar :user="$user" size="sm" />
                                    <div class="ml-3">
                                        <div class="text-sm font-medium text-slate-200">
                                            {{ $user->name }}
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-slate-400">
                                    {{ $user->email }}
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                @if($user->role === 'admin')
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-900/30 text-red-400">
                                        Admin
                                    </span>
                                @else
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-900/30 text-blue-400">
                                        User
                                    </span>
                                @endif
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-slate-400">
                                {{ $user->created_at->format('M d, Y') }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <a href="{{ route('profile.show', $user) }}"
                                   class="text-amber-400 hover:text-amber-300 mr-3">
                                    View
                                </a>
                                <a href="{{ route('admin.users.edit', $user) }}"
                                   class="text-blue-400 hover:text-blue-300 mr-3">
                                    Edit
                                </a>
                                @if($user->id !== auth()->id() && $user->id !== 1)
                                    <form method="POST"
                                          action="{{ route('admin.users.destroy', $user) }}"
                                          class="inline"
                                          onsubmit="return confirm('Are you sure you want to delete this user?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-400 hover:text-red-300">
                                            Delete
                                        </button>
                                    </form>
                                @elseif($user->id === 1)
                                    <span class="text-slate-600 cursor-not-allowed" title="First admin cannot be deleted">Delete</span>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-4 text-center text-slate-400">
                                No users found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-6">
            {{ $users->links() }}
        </div>
    </div>
</x-admin-layout>
