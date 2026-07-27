<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>{{ ($pageTitle ?? 'Dashboard') . ' - ' . config('app.name', 'Sadata') }}</title>
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet" />
    @php
        $themeStyles = $themeStyles ?? config('sadata_ui_bootstrap.templates.bootstrap.assets.theme.styles', []);
        $themeScripts = $themeScripts ?? config('sadata_ui_bootstrap.templates.bootstrap.assets.theme.scripts', []);
    @endphp
    @foreach ($themeStyles as $style)
        <link href="{{ $style }}" rel="stylesheet" type="text/css" />
    @endforeach
    <style>
        :root {
            --sadata-primary: #E31937;
            --sadata-secondary: #007BFF;
            --sadata-sidebar-width: {{ config('sadata_ui_bootstrap.layout.sidebar_width', '260px') }};
            --sadata-header-height: {{ config('sadata_ui_bootstrap.layout.header_height', '60px') }};
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            background-color: #f5f6fa;
            color: #343a40;
            overflow-x: hidden;
        }

        /* Sidebar */
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            width: var(--sadata-sidebar-width);
            height: 100vh;
            background: linear-gradient(180deg, #1a1a2e 0%, #16213e 100%);
            color: #fff;
            z-index: 1040;
            transition: transform 0.3s ease;
            overflow-y: auto;
            overflow-x: hidden;
        }

        .sidebar::-webkit-scrollbar {
            width: 4px;
        }

        .sidebar::-webkit-scrollbar-thumb {
            background: rgba(255,255,255,0.2);
            border-radius: 4px;
        }

        .sidebar-brand {
            padding: 1rem 1.5rem;
            font-size: 1.25rem;
            font-weight: 700;
            color: #fff;
            text-decoration: none;
            border-bottom: 1px solid rgba(255,255,255,0.1);
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .sidebar-brand:hover {
            color: #fff;
        }

        .sidebar-nav {
            padding: 1rem 0;
        }

        .sidebar-nav .nav-item {
            margin: 0;
        }

        .sidebar-nav .nav-link {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 0.75rem 1.5rem;
            color: rgba(255,255,255,0.75);
            text-decoration: none;
            font-size: 0.9rem;
            font-weight: 500;
            transition: all 0.2s ease;
            border-left: 3px solid transparent;
        }

        .sidebar-nav .nav-link:hover,
        .sidebar-nav .nav-link.active {
            color: #fff;
            background-color: rgba(255,255,255,0.05);
            border-left-color: var(--sadata-primary);
        }

        .sidebar-nav .nav-link i {
            font-size: 1.1rem;
            width: 20px;
            text-align: center;
        }

        .sidebar-nav .nav-section-title {
            padding: 1rem 1.5rem 0.5rem;
            font-size: 0.7rem;
            font-weight: 600;
            text-transform: uppercase;
            color: rgba(255,255,255,0.4);
            letter-spacing: 0.05em;
        }

        /* Main Content */
        .main-content {
            margin-left: var(--sadata-sidebar-width);
            min-height: 100vh;
            transition: margin-left 0.3s ease;
        }

        /* Header */
        .top-header {
            height: var(--sadata-header-height);
            background-color: #fff;
            border-bottom: 1px solid #e9ecef;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 1.5rem;
            position: sticky;
            top: 0;
            z-index: 1030;
        }

        .top-header-left {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .top-header-right {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .header-title {
            font-size: 1rem;
            font-weight: 600;
            color: #1a1a2e;
            margin: 0;
        }

        .header-subtitle {
            font-size: 0.75rem;
            color: #6c757d;
            margin: 0;
        }

        /* Content Area */
        .content-area {
            padding: 1.5rem;
        }

        /* Cards */
        .card {
            border: none;
            border-radius: 0.5rem;
            box-shadow: 0 2px 8px rgba(0,0,0,0.04);
            margin-bottom: 1.5rem;
        }

        .card-header {
            background-color: #fff;
            border-bottom: 1px solid #e9ecef;
            padding: 1rem 1.25rem;
            font-weight: 600;
            font-size: 0.95rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .card-body {
            padding: 1.25rem;
        }

        /* Buttons */
        .btn-primary {
            background-color: var(--sadata-primary);
            border-color: var(--sadata-primary);
        }

        .btn-primary:hover,
        .btn-primary:focus {
            background-color: #c41530;
            border-color: #c41530;
        }

        .btn-secondary {
            background-color: var(--sadata-secondary);
            border-color: var(--sadata-secondary);
        }

        /* Forms */
        .form-control:focus,
        .form-select:focus {
            border-color: var(--sadata-secondary);
            box-shadow: 0 0 0 0.2rem rgba(0,123,255,0.15);
        }

        /* Mobile Responsive */
        @media (max-width: 991.98px) {
            .sidebar {
                transform: translateX(-100%);
            }

            .sidebar.active {
                transform: translateX(0);
            }

            .main-content {
                margin-left: 0;
            }

            .sidebar-overlay {
                display: none;
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background: rgba(0,0,0,0.5);
                z-index: 1035;
            }

            .sidebar-overlay.active {
                display: block;
            }
        }

        /* Utility */
        .text-sadata-primary { color: var(--sadata-primary); }
        .bg-sadata-primary { background-color: var(--sadata-primary); }
        .text-sadata-secondary { color: var(--sadata-secondary); }
        .bg-sadata-secondary { background-color: var(--sadata-secondary); }
    </style>
</head>
<body>
    <!-- Sidebar Overlay (Mobile) -->
    <div class="sidebar-overlay" id="sidebarOverlay"></div>

    <!-- Sidebar -->
    <aside class="sidebar" id="sidebar">
        <a href="{{ route(config('sadata_ui_bootstrap.routes.dashboard', 'dashboard')) }}" class="sidebar-brand">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <rect x="3" y="3" width="7" height="7" rx="1"/>
                <rect x="14" y="3" width="7" height="7" rx="1"/>
                <rect x="3" y="14" width="7" height="7" rx="1"/>
                <rect x="14" y="14" width="7" height="7" rx="1"/>
            </svg>
            {{ config('app.name', 'Sadata') }}
        </a>
        <nav class="sidebar-nav" id="sidebarNav">
            @include('sadata-bootstrap::components.theme.bootstrap.sidebar')
        </nav>
    </aside>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Top Header -->
        <header class="top-header">
            <div class="top-header-left">
                <button class="btn btn-link text-muted d-lg-none" id="sidebarToggle">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="3" y1="6" x2="21" y2="6"/>
                        <line x1="3" y1="12" x2="21" y2="12"/>
                        <line x1="3" y1="18" x2="21" y2="18"/>
                    </svg>
                </button>
                <div>
                    <h1 class="header-title">{{ $pageTitle ?? 'Dashboard' }}</h1>
                    <p class="header-subtitle mb-0">{{ $pageDescription ?? '' }}</p>
                </div>
            </div>
            <div class="top-header-right">
                <div class="dropdown">
                    <button class="btn btn-link text-muted" type="button" data-bs-toggle="dropdown">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"/><path d="M13.73 21a2 2 0 0 1-3.46 0"/>
                        </svg>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="#">Notifications</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#">Settings</a></li>
                    </ul>
                </div>
                <div class="dropdown">
                    <button class="btn btn-link text-muted d-flex align-items-center gap-2" type="button" data-bs-toggle="dropdown">
                        <div class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center" style="width:32px;height:32px;">
                            {{ substr(auth()->user()->name ?? 'U', 0, 1) }}
                        </div>
                        <span class="d-none d-md-inline text-dark">{{ auth()->user()->name ?? 'User' }}</span>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="#">Profile</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <form method="POST" action="{{ route(config('sadata_ui_bootstrap.routes.logout', 'logout')) }}">
                                @csrf
                                <button type="submit" class="dropdown-item text-danger">Logout</button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </header>

        <!-- Content -->
        <main class="content-area">
            @yield('content')
        </main>
    </div>

    @foreach ($themeScripts as $script)
        <script src="{{ asset($script) }}"></script>
    @endforeach
    <script>
        // Sidebar toggle for mobile
        document.getElementById('sidebarToggle').addEventListener('click', function() {
            document.getElementById('sidebar').classList.toggle('active');
            document.getElementById('sidebarOverlay').classList.toggle('active');
        });

        document.getElementById('sidebarOverlay').addEventListener('click', function() {
            document.getElementById('sidebar').classList.remove('active');
            this.classList.remove('active');
        });

        // Active menu state
        var currentPath = window.location.pathname;
        document.querySelectorAll('.sidebar-nav .nav-link').forEach(function(link) {
            if (link.getAttribute('href') === currentPath) {
                link.classList.add('active');
            }
        });
    </script>
</body>
</html>
