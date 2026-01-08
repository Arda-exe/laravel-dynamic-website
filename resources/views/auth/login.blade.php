<x-guest-layout>
    <h2 class="text-2xl font-bold text-center mb-6 elden-text-gold" style="font-family: 'Cinzel', serif;">
        Login to Your Account
    </h2>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <label for="email" class="block text-sm font-medium text-amber-400 mb-2">
                {{ __('Email') }}
            </label>
            <input id="email" class="elden-input block w-full px-4 py-2" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <label for="password" class="block text-sm font-medium text-amber-400 mb-2">
                {{ __('Password') }}
            </label>
            <input id="password" class="elden-input block w-full px-4 py-2" type="password" name="password" required autocomplete="current-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-amber-900/30 bg-slate-900/50 text-amber-600 shadow-sm focus:ring-amber-600" name="remember">
                <span class="ms-2 text-sm text-slate-300">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex flex-col sm:flex-row items-center justify-between mt-6 gap-4">
            @if (Route::has('password.request'))
                <a class="text-sm text-amber-400 hover:text-amber-300 transition-colors" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <button type="submit" id="login-btn" class="elden-button w-full sm:w-auto">
                {{ __('Log in') }}
            </button>
        </div>

        <div class="mt-6 text-center">
            <span class="text-slate-400 text-sm">Don't have an account?</span>
            <a href="{{ route('register') }}" class="text-amber-400 hover:text-amber-300 ml-1 font-medium transition-colors">
                Register
            </a>
        </div>
    </form>

    <script>
        document.querySelector('form').addEventListener('submit', function(e) {
            const btn = document.getElementById('login-btn');
            btn.disabled = true;
            btn.innerHTML = '<span class="inline-block animate-spin mr-2">⟳</span> Logging in...';
        });
    </script>
</x-guest-layout>
