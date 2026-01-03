<x-app-layout>
    <x-slot name="header">
        Contact Us
    </x-slot>

    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="elden-card p-8">
            <p class="text-slate-300 mb-8">
                Have a question or feedback? Send us a message and we'll get back to you as soon as possible.
            </p>

            <form method="POST" action="{{ route('contact.store') }}">
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
                           placeholder="Your name">
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
                           value="{{ old('email') }}"
                           required
                           maxlength="255"
                           class="elden-input w-full px-4 py-2"
                           placeholder="your.email@example.com">
                    @error('email')
                        <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Subject -->
                <div class="mb-6">
                    <label for="subject" class="block text-sm font-medium text-amber-400 mb-2">
                        Subject <span class="text-red-400">*</span>
                    </label>
                    <input type="text"
                           id="subject"
                           name="subject"
                           value="{{ old('subject') }}"
                           required
                           maxlength="255"
                           class="elden-input w-full px-4 py-2"
                           placeholder="What is this about?">
                    @error('subject')
                        <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Message -->
                <div class="mb-6">
                    <label for="message" class="block text-sm font-medium text-amber-400 mb-2">
                        Message <span class="text-red-400">*</span>
                    </label>
                    <textarea id="message"
                              name="message"
                              rows="8"
                              required
                              maxlength="2000"
                              class="elden-input w-full px-4 py-2"
                              placeholder="Your message...">{{ old('message') }}</textarea>
                    @error('message')
                        <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Submit Button -->
                <div class="flex items-center justify-end">
                    <button type="submit" class="elden-button">
                        Send Message
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
