@props(['filters' => [], 'formId' => null])

@if (!empty($filters))
    <div class="card border-0 shadow-sm mb-4">
        <div class="card-body">
            <form id="{{ $formId }}" method="GET" class="row g-3">
                @foreach ($filters as $filter)
                    <div class="col-md-{{ $filter['width'] ?? 4 }} {{ $filter['class'] ?? '' }}">
                        <label class="form-label small fw-semibold text-muted">{{ $filter['label'] ?? '' }}</label>
                        @if ($filter['type'] === 'select')
                            <select name="{{ $filter['name'] }}" class="form-select form-select-sm">
                                <option value="">{{ $filter['placeholder'] ?? 'All' }}</option>
                                @foreach (($filter['options'] ?? []) as $option)
                                    <option value="{{ $option['value'] }}" {{ request($filter['name']) == $option['value'] ? 'selected' : '' }}>
                                        {{ $option['label'] }}
                                    </option>
                                @endforeach
                            </select>
                        @elseif ($filter['type'] === 'date')
                            <input type="date" name="{{ $filter['name'] }}" class="form-control form-control-sm" value="{{ request($filter['name']) }}">
                        @elseif ($filter['type'] === 'text')
                            <input type="text" name="{{ $filter['name'] }}" class="form-control form-control-sm" value="{{ request($filter['name']) }}" placeholder="{{ $filter['placeholder'] ?? '' }}">
                        @endif
                    </div>
                @endforeach
                <div class="col-12 d-flex gap-2">
                    <button type="submit" class="btn btn-primary btn-sm">
                        <i class="bi bi-search me-1"></i> Filter
                    </button>
                    <a href="{{ request()->url() }}" class="btn btn-outline-secondary btn-sm">Reset</a>
                </div>
            </form>
        </div>
    </div>
@endif
