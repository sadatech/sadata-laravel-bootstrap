@props(['items' => [], 'targetId' => null])

@if (!empty($items))
    <div class="row g-2 mb-3">
        @foreach ($items as $item)
            <div class="col-6 col-md-4 col-lg">
                <div class="card h-100 mb-0">
                    <div class="card-body p-3">
                        <div class="d-flex align-items-start justify-content-between gap-2">
                            <div class="text-muted small text-uppercase fw-semibold">{{ $item['label'] ?? '' }}</div>
                            @if (!empty($item['icon']))
                                <i class="bi {{ $item['icon'] }} text-primary"></i>
                            @endif
                        </div>
                        <div class="fs-3 fw-bold text-primary lh-1 mt-2">{{ $item['value'] ?? '0' }}</div>
                        @if (isset($item['trend']))
                            <div class="small mt-2 {{ $item['trend'] > 0 ? 'text-success' : 'text-danger' }}">
                                <i class="bi bi-arrow-{{ $item['trend'] > 0 ? 'up' : 'down' }}-right"></i>
                                {{ abs($item['trend']) }}%
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endif
