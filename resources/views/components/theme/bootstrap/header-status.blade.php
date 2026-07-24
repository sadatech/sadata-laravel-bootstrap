@props(['eyebrow' => null, 'title' => null, 'icon' => null])

@if ($title || $eyebrow)
    <div class="d-flex align-items-center gap-2">
        @if ($icon)
            <i class="bi {{ $icon }} fs-5 text-muted"></i>
        @endif
        <div>
            @if ($eyebrow)
                <span class="badge bg-primary-subtle text-primary fw-semibold" style="font-size: 0.7rem;">{{ $eyebrow }}</span>
            @endif
            @if ($title)
                <span class="fw-semibold text-dark ms-1">{{ $title }}</span>
            @endif
        </div>
    </div>
@endif
