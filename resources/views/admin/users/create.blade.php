<x-admin-layout>
    <x-slot name="header">
        Create New User
    </x-slot>

    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="elden-card p-8">
            <form method="POST" action="{{ route('admin.users.store') }}">
                @csrf

                <!-- Name -->
                <div class="mb-6">
                    <label for="name" class="block text-sm font-medium text-amber-400 mb-2">
                        Name <span class="text-red-400">*</span>
                    </label>
                    <input type="text"
                           id="name"
                           name="name"
                           value="{{ old('name') }}"
                           required
                           maxlength="255"
                           class="elden-input w-full px-4 py-2"
                           placeholder="Enter user's full name">
                    @error('name')
                        <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Username -->
                <div class="mb-6">
                    <label for="username" class="block text-sm font-medium text-amber-400 mb-2">
                        Username <span class="text-red-400">*</span>
                    </label>
                    <input type="text"
                           id="username"
                           name="username"
                           value="{{ old('username') }}"
                           required
                           maxlength="255"
                           class="elden-input w-full px-4 py-2"
                           placeholder="username">
                    <p class="mt-1 text-xs text-slate-400">
                        Letters, numbers, dashes and underscores only
                    </p>
                    @error('username')
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
                           value="{{ old('email') }}"
                           required
                           maxlength="255"
                           class="elden-input w-full px-4 py-2"
                           placeholder="user@example.com">
                    @error('email')
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
                               {{ old('is_admin') ? 'checked' : '' }}
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

                <!-- Password Reset Notice -->
                <div class="mb-6 p-4 bg-blue-900/20 rounded border border-blue-600/30">
                    <div class="flex items-start">
                        <svg class="w-5 h-5 text-blue-400 mt-0.5 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <div>
                            <h3 class="text-sm font-medium text-blue-300 mb-1">Password Reset Email</h3>
                            <p class="text-xs text-blue-200/70">
                                A password reset link will be automatically sent to the user's email address. They will need to set their own password before they can log in.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Submit Buttons -->
                <div class="flex items-center justify-between">
                    <a href="{{ route('admin.users.index') }}"
                       class="bg-slate-700 hover:bg-slate-600 text-amber-400 font-bold py-2 px-6 rounded border-2 border-amber-900/50 transition duration-300">
                        Cancel
                    </a>
                    <button type="submit" class="elden-button">
                        Create User
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-admin-layout>
