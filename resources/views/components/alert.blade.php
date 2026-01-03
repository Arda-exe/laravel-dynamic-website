@props(['type' => 'info', 'message'])

@php
    $classes = [
        'success' => 'bg-green-900 border-green-600 text-green-200',
        'error' => 'bg-red-900 border-red-600 text-red-200',
        'warning' => 'bg-yellow-900 border-yellow-600 text-yellow-200',
        'info' => 'bg-blue-900 border-blue-600 text-blue-200',
    ];

    $class = $classes[$type] ?? $classes['info'];
@endphp

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-4">
    <div class="border-l-4 p-4 rounded {{ $class }}" role="alert">
        <p class="font-medium">{{ $message }}</p>
    </div>
</div>
