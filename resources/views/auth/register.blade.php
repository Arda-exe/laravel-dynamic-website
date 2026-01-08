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
            <input id="password" class="elden-input block w-full px-4 py-2" type="password" name="password" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <label for="password_confirmation" class="block text-sm font-medium text-amber-400 mb-2">
                {{ __('Confirm Password') }}
            </label>
            <input id="password_confirmation" class="elden-input block w-full px-4 py-2" type="password" name="password_confirmation" required autocomplete="new-password" />
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
        document.querySelector('form').addEventListener('submit', function(e) {
            const btn = document.getElementById('register-btn');
            btn.disabled = true;
            btn.innerHTML = '<span class="inline-block animate-spin mr-2">⟳</span> Registering...';
        });
    </script>
</x-guest-layout>
