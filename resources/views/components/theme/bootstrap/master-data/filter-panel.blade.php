@props(['filters' => [], 'formId' => null])

@if (!empty($filters))
    <div {{ $attributes->merge(['class' => 'card mb-3']) }}>
        <div class="card-body p-3">
            <div class="d-flex align-items-center justify-content-between mb-3">
                <div>
                    <div class="fw-semibold text-dark">Filter data</div>
                    <div class="text-muted small">Persempit daftar tanpa mengubah data.</div>
                </div>
                <i class="bi bi-funnel text-primary"></i>
            </div>
            <form id="{{ $formId }}" method="GET" class="row g-2">
                @foreach ($filters as $filter)
                    @php
                        $filterName = $filter['name'] ?? $filter['key'] ?? '';
                        $filterType = $filter['type'] ?? 'text';
                        $filterOptions = $filter['options'] ?? [];
                    @endphp
                    <div class="col-md-{{ $filter['width'] ?? 4 }} {{ $filter['class'] ?? '' }}">
                        <label class="form-label fw-semibold">{{ $filter['label'] ?? '' }}</label>
                        @if (in_array($filterType, ['select', 'foreign'], true))
                            <select name="{{ $filterName }}" class="form-select form-select-sm">
                                <option value="">{{ $filter['placeholder'] ?? 'All' }}</option>
                                @foreach ($filterOptions as $optionValue => $optionLabel)
                                    @php
                                        $value = is_array($optionLabel) ? ($optionLabel['value'] ?? $optionValue) : $optionValue;
                                        $label = is_array($optionLabel) ? ($optionLabel['label'] ?? $value) : $optionLabel;
                                    @endphp
                                    <option value="{{ $value }}" {{ request($filterName) == $value ? 'selected' : '' }}>
                                        {{ $label }}
                                    </option>
                                @endforeach
                            </select>
                        @elseif ($filterType === 'date')
                            <input type="date" name="{{ $filterName }}" class="form-control form-control-sm" value="{{ request($filterName) }}">
                        @else
                            <input type="text" name="{{ $filterName }}" class="form-control form-control-sm" value="{{ request($filterName) }}" placeholder="{{ $filter['placeholder'] ?? '' }}">
                        @endif
                    </div>
                @endforeach
                <div class="col-12 d-flex gap-2 pt-1">
                    <button type="submit" class="btn btn-primary btn-sm">
                        <i class="bi bi-search me-1"></i> Filter
                    </button>
                    <a href="{{ request()->url() }}" class="btn btn-outline-secondary btn-sm">Reset</a>
                </div>
            </form>
        </div>
    </div>
@endif
