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
                        Name <span class="text-red-400">*</span>
                    </label>
                    <input type="text"
                           id="name"
                           name="name"
                           value="{{ old('name', $user->name) }}"
                           required
                           maxlength="255"
                           class="elden-input w-full px-4 py-2"
                           placeholder="Enter user's full name">
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

                <!-- Username -->
                <div class="mb-6">
                    <label for="username" class="block text-sm font-medium text-amber-400 mb-2">
                        Username
                    </label>
                    <input type="text"
                           id="username"
                           name="username"
                           value="{{ old('username', $user->username) }}"
                           maxlength="255"
                           class="elden-input w-full px-4 py-2"
                           placeholder="username">
                    @error('username')
                        <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Admin Status -->
                <div class="mb-6">
                    <label class="flex items-center">
                        <input type="hidden" name="is_admin" value="0">
                        <input type="checkbox"
                               id="is_admin"
                               name="is_admin"
                               value="1"
                               {{ old('is_admin', $user->is_admin) ? 'checked' : '' }}
                               class="rounded bg-slate-900/50 border-amber-900/30 text-amber-600 focus:border-amber-600 focus:ring-2 focus:ring-amber-600/30">
                        <span class="ml-2 text-sm text-amber-400">Administrator</span>
                    </label>
                    <p class="mt-1 text-xs text-slate-400">
                        Administrators have full access to the admin panel
                    </p>
                    @error('is_admin')
                        <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Roles -->
                <div class="mb-6">
                    <label class="block text-sm font-medium text-amber-400 mb-2">
                        Roles
                    </label>
                    <div class="space-y-2">
                        @foreach($roles as $role)
                            <label class="flex items-center">
                                <input type="checkbox"
                                       name="roles[]"
                                       value="{{ $role->id }}"
                                       {{ in_array($role->id, old('roles', $user->roles->pluck('id')->toArray())) ? 'checked' : '' }}
                                       class="rounded bg-slate-900/50 border-amber-900/30 text-amber-600 focus:border-amber-600 focus:ring-2 focus:ring-amber-600/30">
                                <span class="ml-2 text-sm text-slate-300">
                                    {{ ucfirst($role->name) }}
                                    @if($role->description)
                                        <span class="text-xs text-slate-500">- {{ $role->description }}</span>
                                    @endif
                                </span>
                            </label>
                        @endforeach
                    </div>
                    @error('roles')
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
