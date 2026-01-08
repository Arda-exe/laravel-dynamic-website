<x-guest-layout>
    <h2 class="text-2xl font-bold text-center mb-6 elden-text-gold" style="font-family: 'Cinzel', serif;">
        Join the Tarnished
    </h2>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <label for="email" class="block text-sm font-medium text-amber-400 mb-2">
                {{ __('Email') }}
            </label>
            <input id="email" class="elden-input block w-full px-4 py-2" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <label for="password" class="block text-sm font-medium text-amber-400 mb-2">
                {{ __('Password') }}
            </label>
            <div class="relative">
                <input id="password" class="elden-input block w-full px-4 py-2 pr-12" type="password" name="password" required autocomplete="new-password" />
                <button type="button" onclick="togglePassword('password', 'toggle-password')" class="absolute inset-y-0 right-0 px-3 flex items-center text-slate-400 hover:text-amber-400 transition-colors">
                    <svg id="toggle-password" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                    </svg>
                </button>
            </div>
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <label for="password_confirmation" class="block text-sm font-medium text-amber-400 mb-2">
                {{ __('Confirm Password') }}
            </label>
            <div class="relative">
                <input id="password_confirmation" class="elden-input block w-full px-4 py-2 pr-12" type="password" name="password_confirmation" required autocomplete="new-password" />
                <button type="button" onclick="togglePassword('password_confirmation', 'toggle-password-confirm')" class="absolute inset-y-0 right-0 px-3 flex items-center text-slate-400 hover:text-amber-400 transition-colors">
                    <svg id="toggle-password-confirm" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                    </svg>
                </button>
            </div>
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="mt-4 p-3 bg-slate-800/50 border border-amber-900/20 rounded text-sm text-slate-300">
            <p class="text-amber-400 font-medium mb-1">Note:</p>
            <p>A unique username will be automatically generated for you. You can change it later in your profile settings.</p>
        </div>

        <div class="flex flex-col sm:flex-row items-center justify-between mt-6 gap-4">
            <a class="text-sm text-amber-400 hover:text-amber-300 transition-colors" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <button type="submit" id="register-btn" class="elden-button w-full sm:w-auto">
                {{ __('Register') }}
            </button>
        </div>
    </form>

    <script>
        function togglePassword(inputId, iconId) {
            const input = document.getElementById(inputId);
            const icon = document.getElementById(iconId);

            if (input.type === 'password') {
                input.type = 'text';
                icon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"></path>';
            } else {
                input.type = 'password';
                icon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>';
            }
        }

        document.querySelector('form').addEventListener('submit', function(e) {
            const btn = document.getElementById('register-btn');
            btn.disabled = true;
            btn.innerHTML = '<span class="inline-block animate-spin mr-2">⟳</span> Registering...';
        });
    </script>
</x-guest-layout>
