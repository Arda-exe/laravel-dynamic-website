<x-admin-layout>
    <x-slot name="header">
        Edit User
    </x-slot>

    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="elden-card p-8">
            <form method="POST" action="{{ route('admin.users.update', $user) }}">
                @csrf
                @method('PATCH')

                <!-- Name -->
                <div class="mb-6">
                    <label for="name" class="block text-sm font-medium text-amber-400 mb-2">
                        Username <span class="text-red-400">*</span>
                    </label>
                    <input type="text"
                           id="name"
                           name="name"
                           value="{{ old('name', $user->name) }}"
                           required
                           maxlength="255"
                           class="elden-input w-full px-4 py-2"
                           placeholder="tarnished_123456">
                    @error('name')
                        <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Email -->
                <div class="mb-6">
                    <label for="email" class="block text-sm font-medium text-amber-400 mb-2">
                        Email <span class="text-red-400">*</span>
                    </label>
                    <input type="email"
                           id="email"
                           name="email"
                           value="{{ old('email', $user->email) }}"
                           required
                           maxlength="255"
                           class="elden-input w-full px-4 py-2"
                           placeholder="user@example.com">
                    @error('email')
                        <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Role -->
                <div class="mb-6">
                    <label for="role" class="block text-sm font-medium text-amber-400 mb-2">
                        Role <span class="text-red-400">*</span>
                    </label>
                    <select id="role"
                            name="role"
                            required
                            {{ $user->id === 1 ? 'disabled' : '' }}
                            class="elden-input w-full px-4 py-2 {{ $user->id === 1 ? 'opacity-50 cursor-not-allowed' : '' }}">
                        <option value="user" {{ old('role', $user->role) === 'user' ? 'selected' : '' }}>User</option>
                        <option value="admin" {{ old('role', $user->role) === 'admin' ? 'selected' : '' }}>Administrator</option>
                    </select>
                    @if($user->id === 1)
                        <input type="hidden" name="role" value="admin">
                    @endif
                    <p class="mt-1 text-xs text-slate-400">
                        @if($user->id === 1)
                            <span class="text-amber-500 font-medium">Protected:</span> The first administrator cannot have their admin role removed
                        @else
                            Administrators have full access to the admin panel
                        @endif
                    </p>
                    @error('role')
                        <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- User Info -->
                <div class="mb-6 p-4 bg-slate-800/30 rounded border border-amber-900/20">
                    <h3 class="text-sm font-medium text-amber-400 mb-2">User Information</h3>
                    <div class="space-y-1 text-sm text-slate-400">
                        <p><span class="text-amber-400">Created:</span> {{ $user->created_at->format('F d, Y') }}</p>
                        @if($user->birthday)
                            <p><span class="text-amber-400">Birthday:</span> {{ $user->birthday->format('F d, Y') }}</p>
                        @endif
                        <p><span class="text-amber-400">Forum Threads:</span> {{ $user->forumThreads()->count() }}</p>
                        <p><span class="text-amber-400">Forum Replies:</span> {{ $user->forumReplies()->count() }}</p>
                        <p><span class="text-amber-400">Comments:</span> {{ $user->comments()->count() }}</p>
                    </div>
                </div>

                <!-- Submit Buttons -->
                <div class="flex items-center justify-between">
                    <a href="{{ route('admin.users.index') }}"
                       class="bg-slate-700 hover:bg-slate-600 text-amber-400 font-bold py-2 px-6 rounded border-2 border-amber-900/50 transition duration-300">
                        Cancel
                    </a>
                    <button type="submit" class="elden-button">
                        Update User
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-admin-layout>
