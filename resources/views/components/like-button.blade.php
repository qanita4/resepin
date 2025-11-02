@props([
    'recipe',
    'likesCount' => 0,
    'isLiked' => false,
    'variant' => 'compact', // compact, large
])

@php
    $buttonClasses = [
        'compact' => 'inline-flex items-center gap-1 rounded-full border px-3 py-1 text-xs font-semibold transition focus:outline-none focus:ring-2 focus:ring-offset-2',
        'large' => 'inline-flex items-center gap-2 rounded-full border px-5 py-2 text-sm font-semibold transition focus:outline-none focus:ring-2 focus:ring-offset-2',
    ][$variant] ?? 'inline-flex items-center gap-1 rounded-full border px-3 py-1 text-xs font-semibold transition focus:outline-none focus:ring-2 focus:ring-offset-2';

    $borderColor = $isLiked ? 'border-transparent bg-resepin-tomato text-white focus:ring-resepin-tomato' : 'border-gray-200 bg-white text-gray-600 hover:border-resepin-tomato/60 hover:text-resepin-tomato focus:ring-resepin-tomato/40';

    $iconClasses = $variant === 'large' ? 'h-5 w-5' : 'h-4 w-4';
@endphp

@if (auth()->check())
    <form method="POST" action="{{ $isLiked ? route('recipes.likes.destroy', $recipe) : route('recipes.likes.store', $recipe) }}">
        @csrf
        @if ($isLiked)
            @method('DELETE')
        @endif
        <button type="submit" class="{{ $buttonClasses }} {{ $borderColor }}">
            @if ($isLiked)
                <svg class="{{ $iconClasses }}" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                    <path d="M12 21.35 10.55 20.03C5.4 15.36 2 12.27 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.77-3.4 6.86-8.55 11.54L12 21.35z" />
                </svg>
            @else
                <svg class="{{ $iconClasses }}" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true">
                    <path d="M16.5 3c-1.74 0-3.41.81-4.5 2.09C10.91 3.81 9.24 3 7.5 3 4.42 3 2 5.42 2 8.5c0 3.77 3.4 6.86 8.55 11.54L12 21.35l1.45-1.32C18.6 15.36 22 12.27 22 8.5 22 5.42 19.58 3 16.5 3z" />
                </svg>
            @endif
            <span>{{ $likesCount }}</span>
        </button>
    </form>
@else
    <a
        href="{{ route('login') }}"
        class="{{ $buttonClasses }} {{ $borderColor }}"
    >
        <svg class="{{ $iconClasses }}" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true">
            <path d="M16.5 3c-1.74 0-3.41.81-4.5 2.09C10.91 3.81 9.24 3 7.5 3 4.42 3 2 5.42 2 8.5c0 3.77 3.4 6.86 8.55 11.54L12 21.35l1.45-1.32C18.6 15.36 22 12.27 22 8.5 22 5.42 19.58 3 16.5 3z" />
        </svg>
        <span>{{ $likesCount }}</span>
    </a>
@endif
