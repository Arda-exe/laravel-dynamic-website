<x-app-layout>
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6">
        <!-- Go Back Button -->
        <div>
            <a href="{{ route('profile.show', auth()->user()) }}" class="inline-flex items-center text-amber-400 hover:text-amber-300 transition-colors">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                Back to Profile
            </a>
        </div>
        <!-- Profile Photo -->
        <div class="elden-card p-8">
            <h3 class="text-xl font-bold text-amber-400 mb-6">Profile Photo</h3>

            <div class="flex items-center gap-6">
                <x-user-avatar :user="$user" size="xl" />
                
                <div class="flex-grow">
                    <p class="text-2xl font-bold text-amber-400 mb-2">{{ $user->name }}</p>
                    <p class="text-slate-300 text-sm mb-4">Choose from preset avatars or upload your own custom photo.</p>
                    <button
                        x-data=""
                        x-on:click.prevent="$dispatch('open-modal', 'edit-profile-photo')"
                        class="elden-button"
                    >Edit Profile Photo</button>
                </div>
            </div>
        </div>

        <x-modal name="edit-profile-photo" focusable maxWidth="lg">
            <div class="p-6">
                <h2 class="text-2xl font-bold text-amber-400 mb-6" style="font-family: 'Cinzel', serif;">Choose Profile Photo</h2>
                
                <!-- Preset Avatars -->
                <div class="mb-8">
                    <h3 class="text-lg font-semibold text-amber-400 mb-4">Preset Avatars</h3>
                    <form method="POST" action="{{ route('profile.updatePhoto') }}" id="preset-form">
                        @csrf
                        <input type="hidden" name="preset_photo" id="preset-photo-input">
                        
                        <div class="flex flex-col gap-4 mb-6">
                            <!-- First Row -->
                            <div class="flex justify-around gap-4">
                                @for($i = 1; $i <= 5; $i++)
                                    <button
                                        type="button"
                                        data-photo="images/avatars/pfp{{ $i }}.webp"
                                        onclick="selectPreset(this.getAttribute('data-photo'), this)"
                                        class="preset-avatar group relative"
                                    >
                                        <img src="{{ asset('images/avatars/pfp' . $i . '.webp') }}" 
                                             alt="Avatar {{ $i }}" 
                                             class="w-20 h-20 rounded-full object-cover border-4 border-amber-900/30 group-hover:border-amber-500 group-hover:shadow-lg group-hover:shadow-amber-500/50 transition-all group-hover:scale-110 cursor-pointer">
                                        <div class="absolute inset-0 rounded-full bg-amber-500/0 group-hover:bg-amber-500/20 transition-all pointer-events-none"></div>
                                    </button>
                                @endfor
                            </div>
                            <!-- Second Row -->
                            <div class="flex justify-around gap-4">
                                @for($i = 6; $i <= 10; $i++)
                                    <button
                                        type="button"
                                        data-photo="images/avatars/pfp{{ $i }}.webp"
                                        onclick="selectPreset(this.getAttribute('data-photo'), this)"
                                        class="preset-avatar group relative"
                                    >
                                        <img src="{{ asset('images/avatars/pfp' . $i . '.webp') }}" 
                                             alt="Avatar {{ $i }}" 
                                             class="w-20 h-20 rounded-full object-cover border-2 border-amber-900/30 group-hover:border-amber-600/60 group-hover:shadow-md transition-all group-hover:scale-105 cursor-pointer">
                                        <div class="absolute inset-0 rounded-full bg-amber-500/0 group-hover:bg-amber-500/10 transition-all pointer-events-none"></div>
                                    </button>
                                @endfor
                            </div>
                        </div>
                        
                        <button 
                            type="submit" 
                            id="preset-submit-btn"
                            disabled
                            class="elden-button w-full disabled:opacity-50 disabled:cursor-not-allowed"
                        >
                            Upload Selected Photo
                        </button>
                    </form>
                </div>

                <div class="elden-border mb-6"></div>

                <!-- Custom Upload -->
                <div>
                    <h3 class="text-lg font-semibold text-amber-400 mb-4">Upload Custom Photo</h3>
                    <form method="POST" action="{{ route('profile.updatePhoto') }}" enctype="multipart/form-data" id="upload-form">
                        @csrf
                        
                        <div class="flex items-center gap-6 mb-6">
                            <div id="custom-preview" class="flex-shrink-0">
                                <img id="custom-preview-img" class="w-24 h-24 rounded-full object-cover border-2 border-amber-600" style="display: none;">
                                <div id="custom-preview-placeholder" class="w-24 h-24 rounded-full bg-slate-800 border-2 border-amber-900/30 flex items-center justify-center">
                                    <svg class="w-8 h-8 text-slate-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                </div>
                            </div>
                            
                            <div class="flex-grow">
                                <label for="photo" class="block">
                                    <div class="elden-button text-center cursor-pointer inline-block">
                                        Choose File
                                    </div>
                                </label>
                                <input type="file"
                                       id="photo"
                                       name="photo"
                                       accept="image/jpeg,image/jpg,image/png,image/webp"
                                       onchange="previewCustomImage(event)"
                                       class="hidden">
                                <p class="text-xs text-slate-400 mt-2">JPEG, PNG, WEBP • Max 4MB</p>
                                @error('photo')
                                    <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="flex justify-end gap-3">
                            <button type="button" x-on:click="$dispatch('close')" class="px-6 py-2 bg-slate-700 text-slate-200 rounded-lg hover:bg-slate-600 transition-colors">
                                Cancel
                            </button>
                            <button type="submit" class="elden-button" id="upload-submit-btn" disabled>
                                Upload Photo
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </x-modal>

        <!-- Profile Information -->
        <div class="elden-card p-8">
            <h3 class="text-xl font-bold text-amber-400 mb-6">Profile Information</h3>

            <form method="POST" action="{{ route('profile.update') }}">
                @csrf
                @method('PATCH')

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
                    <label for="name" class="block text-sm font-medium text-amber-400 mb-2">
                        Username <span class="text-red-400">*</span>
                    </label>
                    <input type="text"
                           id="name"
                           name="name"
                           value="{{ old('name', $user->name) }}"
                           required
                           maxlength="255"
                           pattern="[a-zA-Z0-9_-]+"
                           class="elden-input w-full px-4 py-2"
                           placeholder="your_username">
                    <p class="mt-1 text-xs text-slate-400">Only letters, numbers, underscores, and dashes. Must be unique.</p>
                    @error('name')
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

        function selectPreset(photoPath, button) {
            // Remove selection from all preset avatars
            document.querySelectorAll('.preset-avatar').forEach(btn => {
                const img = btn.querySelector('img');
                img.classList.remove('!border-amber-400', 'ring-2', 'ring-amber-400/50');
            });
            
            // Add selection to clicked photo
            const img = button.querySelector('img');
            img.classList.add('!border-amber-400', 'ring-2', 'ring-amber-400/50');
            
            // Set the hidden input value
            document.getElementById('preset-photo-input').value = photoPath;
            
            // Enable the submit button
            document.getElementById('preset-submit-btn').disabled = false;
        }

        function previewCustomImage(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const img = document.getElementById('custom-preview-img');
                    const placeholder = document.getElementById('custom-preview-placeholder');
                    const uploadBtn = document.getElementById('upload-submit-btn');
                    
                    img.src = e.target.result;
                    img.style.display = 'block';
                    placeholder.style.display = 'none';
                    uploadBtn.disabled = false;
                };
                reader.readAsDataURL(file);
            }
        }
    </script>
</x-app-layout>
