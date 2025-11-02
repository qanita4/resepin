@props(['status'])

@if ($status)
    <div {{ $attributes->merge(['class' => 'font-medium text-sm text-resepin-green']) }}>
        {{ $status }}
    </div>
@endif
