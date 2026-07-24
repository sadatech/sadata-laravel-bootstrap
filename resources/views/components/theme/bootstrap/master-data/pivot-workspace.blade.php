@props(['workspaces' => [], 'currentWorkspace' => null])

@if (!empty($workspaces) && count($workspaces) > 1)
    <div class="row g-3 mb-4">
        @foreach ($workspaces as $ws)
            <div class="col-6 col-md-3 col-lg-2">
                <a href="{{ $ws['url'] ?? '#' }}"
                   class="d-block p-3 rounded border text-decoration-none {{ $ws['id'] == ($currentWorkspace['id'] ?? null) ? 'border-primary bg-primary-subtle' : 'bg-white hover-shadow-sm' }}">
                    <div class="d-flex align-items-center gap-2">
                        <i class="bi bi-folder2-open {{ $ws['id'] == ($currentWorkspace['id'] ?? null) ? 'text-primary' : 'text-muted' }}"></i>
                        <span class="fw-medium {{ $ws['id'] == ($currentWorkspace['id'] ?? null) ? 'text-primary' : 'text-dark' }}">
                            {{ $ws['name'] }}
                        </span>
                    </div>
                    @if (isset($ws['count']))
                        <div class="small text-muted mt-1">{{ $ws['count'] }} items</div>
                    @endif
                </a>
            </div>
        @endforeach
    </div>
@endif
