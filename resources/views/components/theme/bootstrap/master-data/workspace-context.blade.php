@props(['workspace' => null, 'description' => null])

@if ($workspace)
    <div class="d-flex align-items-center gap-2 p-2 bg-light rounded border mb-3">
        <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center" style="width: 36px; height: 36px;">
            <i class="bi bi-building"></i>
        </div>
        <div>
            <div class="fw-semibold text-dark">{{ $workspace['name'] ?? '' }}</div>
            @if ($description)
                <div class="text-muted small">{{ $description }}</div>
            @endif
        </div>
    </div>
@endif
