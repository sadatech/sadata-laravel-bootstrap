@props(['items' => []])

@if (empty($items))
    @php
        $items = [
            ['icon' => 'bi-speedometer2', 'label' => 'Dashboard', 'url' => route(config('sadata_ui_bootstrap.routes.dashboard', 'dashboard'))],
            ['section' => 'Operations'],
            ['icon' => 'bi-ticket', 'label' => 'Tickets', 'url' => route('tickets.index') ?? '#'],
            ['icon' => 'bi-kanban', 'label' => 'Tasks', 'url' => route('tasks.index') ?? '#'],
            ['section' => 'Master Data'],
            ['icon' => 'bi-building', 'label' => 'Clients', 'url' => route('clients.index') ?? '#'],
            ['icon' => 'bi-folder', 'label' => 'Projects', 'url' => route('projects.index') ?? '#'],
            ['icon' => 'bi-people', 'label' => 'Teams', 'url' => route('teams.index') ?? '#'],
            ['icon' => 'bi-person', 'label' => 'Users', 'url' => route('users.index') ?? '#'],
            ['section' => 'System'],
            ['icon' => 'bi-list-ul', 'label' => 'Menus', 'url' => route('menus.index') ?? '#'],
            ['icon' => 'bi-shield-lock', 'label' => 'Roles', 'url' => route('roles.index') ?? '#'],
        ];
    @endphp
@endif

@foreach ($items as $item)
    @if (isset($item['section']))
        <div class="nav-section-title">{{ $item['section'] }}</div>
    @else
        <div class="nav-item">
            <a href="{{ $item['url'] ?? '#' }}" class="nav-link {{ request()->is(ltrim(parse_url($item['url'] ?? '', PHP_URL_PATH), '/')) ? 'active' : '' }}">
                <i class="bi {{ $item['icon'] ?? 'bi-circle' }}"></i>
                <span>{{ $item['label'] }}</span>
            </a>
        </div>
    @endif
@endforeach
