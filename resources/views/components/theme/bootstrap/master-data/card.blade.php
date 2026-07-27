@props([
    'fullHeight' => false,
])

<div {{ $attributes->class([
    'card',
    'h-100' => $fullHeight,
]) }}>
    {{ $slot }}
</div>
