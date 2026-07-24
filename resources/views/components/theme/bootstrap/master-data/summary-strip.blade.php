@props(['items' => [], 'targetId' => null])

@if (!empty($items))
    <div class="row g-3 mb-4">
        @foreach ($items as $item)
            <div class="col-6 col-md-4 col-lg-2">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body p-3">
                        <div class="text-muted small mb-1">{{ $item['label'] ?? '' }}</div>
                        <div class="fs-4 fw-bold text-primary">{{ $item['value'] ?? '0' }}</div>
                        @if (isset($item['trend']))
                            <div class="small {{ $item['trend'] > 0 ? 'text-success' : 'text-danger' }}">
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
