@props(['user', 'size' => 'md'])

@php
    $sizes = [
        'sm' => 'w-8 h-8',
        'md' => 'w-12 h-12',
        'lg' => 'w-16 h-16',
        'xl' => 'w-24 h-24',
    ];

    $sizeClass = $sizes[$size] ?? $sizes['md'];
    $photoUrl = $user->photo ? asset('storage/' . $user->photo) : asset('images/default-avatar.png');
@endphp

<img src="{{ $photoUrl }}"
     alt="{{ $user->username ?? $user->name }}"
     class="rounded-full {{ $sizeClass }} object-cover border-2 border-yellow-600"
     onerror="this.src='{{ asset('images/default-avatar.png') }}'">
