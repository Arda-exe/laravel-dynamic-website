<x-guest-layout>
    <h2 class="text-2xl font-bold text-center mb-6 elden-text-gold" style="font-family: 'Cinzel', serif;">
        Reset Password
    </h2>

    <div class="mb-6 text-sm text-slate-300 text-center">
        Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.
    </div>

    <!-- Session Status -->
    @if (session('status'))
        <div class="mb-4 p-4 rounded bg-green-900/20 border border-green-600/30 text-white text-sm">
            {{ session('status') }}
        </div>
    @endif

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <label for="email" class="block text-sm font-medium text-amber-400 mb-2">
                Email
            </label>
            <input id="email" 
                   class="elden-input block w-full px-4 py-2" 
                   type="email" 
                   name="email" 
                   value="{{ old('email') }}" 
                   required 
                   autofocus 
                   autocomplete="username" />
            @error('email')
                <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex flex-col sm:flex-row items-center justify-between mt-6 gap-4">
            <a class="text-sm text-amber-400 hover:text-amber-300 transition-colors" href="{{ route('login') }}">
                Back to Login
            </a>

            <button type="submit" class="elden-button w-full sm:w-auto">
                Email Password Reset Link
            </button>
        </div>
    </form>
</x-guest-layout>
