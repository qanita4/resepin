@props(['active'])

@php
$classes = ($active ?? false)
            ? 'inline-flex items-center px-1 pt-1 border-b-2 border-resepin-tomato text-sm font-medium leading-5 text-resepin-tomato focus:outline-none focus:border-resepin-tomato transition duration-150 ease-in-out'
            : 'inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-gray-600 hover:text-resepin-tomato hover:border-resepin-tomato/60 focus:outline-none focus:text-resepin-tomato focus:border-resepin-tomato/60 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
