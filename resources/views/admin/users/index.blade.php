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
                            Roles
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-amber-400 uppercase tracking-wider">
                            Admin
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
                                        @if($user->username)
                                            <div class="text-xs text-slate-400">
                                                @{{ $user->username }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-slate-400">
                                    {{ $user->email }}
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex flex-wrap gap-1">
                                    @forelse($user->roles as $role)
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-900/30 text-blue-400">
                                            {{ $role->name }}
                                        </span>
                                    @empty
                                        <span class="text-xs text-slate-500">No roles</span>
                                    @endforelse
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                @if($user->is_admin)
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-900/30 text-red-400">
                                        Admin
                                    </span>
                                @else
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-700/30 text-gray-400">
                                        User
                                    </span>
                                @endif
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-slate-400">
                                {{ $user->created_at->format('M d, Y') }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <a href="{{ route('profile.show', $user) }}"
                                   class="text-amber-400 hover:text-amber-300 mr-3"
                                   target="_blank">
                                    View
                                </a>
                                <a href="{{ route('admin.users.edit', $user) }}"
                                   class="text-blue-400 hover:text-blue-300 mr-3">
                                    Edit
                                </a>
                                @if($user->id !== auth()->id())
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
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-6 py-4 text-center text-slate-400">
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
