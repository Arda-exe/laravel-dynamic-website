<x-app-layout>
    <x-slot name="header">
        Edit Profile
    </x-slot>

    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6">
        <!-- Profile Photo -->
        <div class="elden-card p-8">
            <h3 class="text-xl font-bold text-amber-400 mb-6">Profile Photo</h3>

            <div class="flex items-center gap-6">
                <div id="preview-container">
                    <x-user-avatar :user="$user" size="xl" />
                </div>

                <form method="POST" action="{{ route('profile.updatePhoto') }}" enctype="multipart/form-data" class="flex-grow">
                    @csrf
                    <div>
                        <label for="photo" class="block text-sm font-medium text-amber-400 mb-2">
                            Upload New Photo (Max 2MB)
                        </label>
                        <input type="file"
                               id="photo"
                               name="photo"
                               accept="image/jpeg,image/jpg,image/png,image/webp"
                               onchange="previewImage(event)"
                               class="elden-input w-full">
                        @error('photo')
                            <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <button type="submit" class="elden-button mt-4">
                        Upload Photo
                    </button>
                </form>
            </div>
        </div>

        <!-- Profile Information -->
        <div class="elden-card p-8">
            <h3 class="text-xl font-bold text-amber-400 mb-6">Profile Information</h3>

            <form method="POST" action="{{ route('profile.update') }}">
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
                           class="elden-input w-full px-4 py-2">
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
                           class="elden-input w-full px-4 py-2">
                    @error('email')
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
                           value="{{ old('username', $user->username) }}"
                           required
                           maxlength="255"
                           pattern="[a-zA-Z0-9_-]+"
                           class="elden-input w-full px-4 py-2"
                           placeholder="your_username">
                    <p class="mt-1 text-xs text-slate-400">Only letters, numbers, underscores, and dashes. Must be unique.</p>
                    @error('username')
                        <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Birthday -->
                <div class="mb-6">
                    <label for="birthday" class="block text-sm font-medium text-amber-400 mb-2">
                        Birthday
                    </label>
                    <input type="date"
                           id="birthday"
                           name="birthday"
                           value="{{ old('birthday', $user->birthday) }}"
                           max="{{ date('Y-m-d') }}"
                           class="elden-input w-full px-4 py-2">
                    @error('birthday')
                        <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Bio -->
                <div class="mb-6">
                    <label for="bio" class="block text-sm font-medium text-amber-400 mb-2">
                        Bio
                    </label>
                    <textarea id="bio"
                              name="bio"
                              rows="4"
                              maxlength="1000"
                              oninput="updateCharCount()"
                              class="elden-input w-full px-4 py-2"
                              placeholder="Tell us about yourself...">{{ old('bio', $user->bio) }}</textarea>
                    <p class="mt-1 text-xs text-slate-400">
                        <span id="char-count">{{ strlen($user->bio ?? '') }}</span>/1000 characters
                    </p>
                    @error('bio')
                        <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex items-center justify-end">
                    <button type="submit" class="elden-button">
                        Save Changes
                    </button>
                </div>
            </form>
        </div>

        <!-- Update Password -->
        <div class="elden-card p-8">
            <h3 class="text-xl font-bold text-amber-400 mb-6">Security</h3>
            <p class="text-sm text-slate-400 mb-4">
                Manage your account security and password.
            </p>
            <button
                x-data=""
                x-on:click.prevent="$dispatch('open-modal', 'update-password')"
                class="elden-button"
            >Change Password</button>
        </div>

        <x-modal name="update-password" :show="$errors->updatePassword->isNotEmpty()" focusable>
            <div class="p-6">
                @include('profile.partials.update-password-form')
            </div>
        </x-modal>

        <!-- Delete Account -->
        <div class="elden-card p-8">
            <h3 class="text-xl font-bold text-red-400 mb-6">Delete Account</h3>
            @include('profile.partials.delete-user-form')
        </div>
    </div>

    <script>
        function updateCharCount() {
            const textarea = document.getElementById('bio');
            const counter = document.getElementById('char-count');
            counter.textContent = textarea.value.length;
        }

        function previewImage(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const container = document.getElementById('preview-container');
                    container.innerHTML = `<img src="${e.target.result}" class="w-24 h-24 rounded-full object-cover border-2 border-amber-600">`;
                };
                reader.readAsDataURL(file);
            }
        }
    </script>
</x-app-layout>
