@props(['items' => []])

@if (empty($items))
    @php
        $items = [
            ['icon' => 'bi-speedometer2', 'label' => 'Dashboard', 'url' => route(config('sadata_ui_bootstrap.routes.dashboard', 'dashboard'))],
            ['section' => 'Operations'],
            ['icon' => 'bi-ticket', 'label' => 'Tickets', 'url' => \Illuminate\Support\Facades\Route::has('tickets.index') ? route('tickets.index') : '#'],
            ['icon' => 'bi-kanban', 'label' => 'Tasks', 'url' => \Illuminate\Support\Facades\Route::has('tasks.index') ? route('tasks.index') : '#'],
            ['section' => 'Master Data'],
            ['icon' => 'bi-building', 'label' => 'Clients', 'url' => \Illuminate\Support\Facades\Route::has('clients.index') ? route('clients.index') : '#'],
            ['icon' => 'bi-folder', 'label' => 'Projects', 'url' => \Illuminate\Support\Facades\Route::has('projects.index') ? route('projects.index') : '#'],
            ['icon' => 'bi-people', 'label' => 'Teams', 'url' => \Illuminate\Support\Facades\Route::has('teams.index') ? route('teams.index') : '#'],
            ['icon' => 'bi-person', 'label' => 'Users', 'url' => \Illuminate\Support\Facades\Route::has('users.index') ? route('users.index') : '#'],
            ['section' => 'System'],
            ['icon' => 'bi-list-ul', 'label' => 'Menus', 'url' => \Illuminate\Support\Facades\Route::has('menus.index') ? route('menus.index') : '#'],
        ];
    @endphp
@endif

@foreach ($items as $item)
    @if (($item['url'] ?? null) === '#')
        @continue
    @endif
    @if (isset($item['section']))
        <div class="nav-section-title">{{ $item['section'] }}</div>
    @else
        <div class="nav-item">
            @php($path = parse_url($item['url'] ?? '#', PHP_URL_PATH) ?: '')
            <a href="{{ $item['url'] ?? '#' }}" class="nav-link {{ $path !== '' && request()->is(ltrim($path, '/')) ? 'active' : '' }}">
                <i class="bi {{ $item['icon'] ?? 'bi-circle' }}"></i>
                <span>{{ $item['label'] }}</span>
            </a>
        </div>
    @endif
@endforeach
