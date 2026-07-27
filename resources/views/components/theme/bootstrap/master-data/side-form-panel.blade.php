@props([
    'id',
    'title',
    'description' => null,
    'modeLabelId' => null,
    'closeButtonId' => null,
    'feedbackId' => null,
    'errorsId' => null,
    'icon' => null,
])

<div {{ $attributes->merge(['id' => $id, 'class' => 'card h-100 mb-0']) }}>
    <div class="card-header bg-white">
        <div class="d-flex align-items-center gap-2">
            @if ($icon)
                <span class="d-inline-flex align-items-center justify-content-center rounded bg-light-primary text-primary" style="width: 2rem; height: 2rem;">
                    <i class="bi bi-pencil-square"></i>
                </span>
            @endif
            <div>
                <h5 class="mb-0 fw-semibold">{{ $title }}</h5>
                @if ($description)
                    <div class="text-muted small mt-1">{{ $description }}</div>
                @endif
            </div>
        </div>
        @if ($closeButtonId)
            <button type="button" class="btn btn-sm btn-light" id="{{ $closeButtonId }}" aria-label="Close form">
                <i class="bi bi-x-lg"></i>
            </button>
        @endif
    </div>

    <div class="card-body overflow-auto">
        @if ($modeLabelId)
            <div class="alert alert-primary-subtle border-0 d-flex align-items-center py-2 px-3 mb-3 small" role="status">
                <i class="bi bi-pencil-square me-2"></i>
                <span id="{{ $modeLabelId }}">Mode: create</span>
            </div>
        @endif

        @if ($feedbackId)
            <div id="{{ $feedbackId }}" class="d-none alert alert-success mb-3"></div>
        @endif

        @if ($errorsId)
            <div id="{{ $errorsId }}" class="d-none alert alert-danger mb-3"></div>
        @endif

        {{ $slot }}
    </div>
</div>
