@props([
    'href',
])

<a
    href="{{ $href }}"
    {{ $attributes->merge([
        'class' => 'group relative block w-full overflow-hidden rounded-lg bg-resepin-tomato px-4 py-2 text-center font-semibold text-white shadow-md shadow-resepin-tomato/30 transition duration-200 hover:brightness-95 focus:outline-none focus:ring-2 focus:ring-resepin-tomato/40 focus:ring-offset-2'
    ]) }}
>
    <span class="inline-flex items-center justify-center gap-2">
        <span>{{ $slot }}</span>
        <svg class="h-4 w-4 transition-transform duration-200 group-hover:translate-x-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14m-6-6l6 6-6 6" />
        </svg>
    </span>
</a>
