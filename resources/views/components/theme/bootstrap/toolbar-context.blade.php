@props(['badge' => null, 'description' => null])

<div class="d-flex flex-column">
    @if ($badge)
        <span class="badge bg-primary-subtle text-primary align-self-start mb-1" style="font-size: 0.7rem;">{{ $badge }}</span>
    @endif
    @if ($description)
        <p class="text-muted small mb-0">{{ $description }}</p>
    @endif
</div>
