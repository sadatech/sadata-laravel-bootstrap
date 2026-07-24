@props(['workspaces' => [], 'currentWorkspace' => null])

@if (!empty($workspaces))
    <div class="dropdown">
        <button class="btn btn-outline-primary btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="bi bi-diagram-3 me-1"></i>
            {{ $currentWorkspace['name'] ?? 'Select Workspace' }}
        </button>
        <ul class="dropdown-menu">
            @foreach ($workspaces as $ws)
                <li>
                    <a class="dropdown-item {{ $ws['id'] == ($currentWorkspace['id'] ?? null) ? 'active' : '' }}"
                       href="{{ $ws['url'] ?? '#' }}">
                        <i class="bi bi-circle-fill small me-2 {{ $ws['id'] == ($currentWorkspace['id'] ?? null) ? 'text-primary' : 'text-muted' }}"></i>
                        {{ $ws['name'] }}
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
@endif
