@props(['type' => 'info', 'message'])

@php
    $classes = [
        'success' => 'bg-green-900/95 border-green-600 text-green-200',
        'error' => 'bg-red-900/95 border-red-600 text-red-200',
        'warning' => 'bg-yellow-900/95 border-yellow-600 text-yellow-200',
        'info' => 'bg-blue-900/95 border-blue-600 text-blue-200',
    ];

    $class = $classes[$type] ?? $classes['info'];
@endphp

<div
    x-data="{ show: true }"
    x-show="show"
    x-init="setTimeout(() => show = false, 5000)"
    x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="opacity-0 translate-y-[-1rem]"
    x-transition:enter-end="opacity-100 translate-y-0"
    x-transition:leave="transition ease-in duration-300"
    x-transition:leave-start="opacity-100 translate-y-0"
    x-transition:leave-end="opacity-0 translate-y-[-1rem]"
    class="fixed top-4 right-4 z-50 max-w-md"
    role="alert"
>
    <div class="border-l-4 p-4 rounded-lg shadow-2xl backdrop-blur-sm {{ $class }} flex items-center justify-between gap-4">
        <p class="font-medium">{{ $message }}</p>
        <button
            @click="show = false"
            class="text-current hover:opacity-70 transition-opacity flex-shrink-0"
            aria-label="Close"
        >
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
        </button>
    </div>
</div>
