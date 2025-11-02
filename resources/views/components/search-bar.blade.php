@props([
    'action' => '#',
    'method' => 'GET',
    'name' => 'q',
    'value' => null,
    'placeholder' => 'Cari...',
    'maxWidth' => 'max-w-2xl',
])

@php
    $originalMethod = strtoupper($method);
    $formMethod = in_array($originalMethod, ['GET', 'POST']) ? $originalMethod : 'POST';
    $spoofMethod = $formMethod === 'POST' && ! in_array($originalMethod, ['GET', 'POST']) ? $originalMethod : null;
@endphp

<form method="{{ $formMethod }}" action="{{ $action }}" class="relative mx-auto {{ $maxWidth }}">
    @if ($formMethod === 'POST')
        @csrf
    @endif

    @if ($spoofMethod)
        @method($spoofMethod)
    @endif

    <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
        <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
        </svg>
    </div>

    <input
        type="text"
        name="{{ $name }}"
        value="{{ $value }}"
        placeholder="{{ $placeholder }}"
    class="block w-full rounded-xl border border-gray-300 py-3 pr-4 pl-10 text-gray-900 placeholder-gray-500 focus:border-transparent focus:ring-2 focus:ring-resepin-tomato"
    />
</form>
