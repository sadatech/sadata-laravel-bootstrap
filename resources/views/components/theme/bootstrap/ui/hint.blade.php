@props([
    'title' => null,
    'body' => null,
    'icon' => 'bi-info-circle-fill',
    'color' => 'primary',
])

<span class="d-inline-flex align-items-center gap-1 text-{{ $color }}" data-bs-toggle="tooltip" title="{{ $title }}: {{ $body }}">
    <i class="bi {{ $icon }}"></i>
    @if($title)
        <span class="small fw-semibold">{{ $title }}</span>
    @endif
</span>
