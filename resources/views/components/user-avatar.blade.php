@props(['user', 'size' => 'md'])

@php
    $sizes = [
        'sm' => 'w-8 h-8',
        'md' => 'w-12 h-12',
        'lg' => 'w-16 h-16',
        'xl' => 'w-24 h-24',
    ];

    $sizeClass = $sizes[$size] ?? $sizes['md'];
    $name = $user->username ?? $user->name;

    // If user has uploaded photo, use it; otherwise use a random default avatar
    if ($user->photo) {
        $photoUrl = asset('storage/' . $user->photo);
    } else {
        // Use user ID to consistently pick the same avatar for each user
        $avatarNumber = ($user->id % 10) + 1;
        $photoUrl = asset("images/avatars/pfp{$avatarNumber}.webp");
    }
@endphp

<img src="{{ $photoUrl }}"
     alt="{{ $name }}"
     class="rounded-full {{ $sizeClass }} object-cover border-2 border-amber-600 shadow-lg"
     onerror="this.src='{{ asset('images/avatars/pfp1.webp') }}'">
