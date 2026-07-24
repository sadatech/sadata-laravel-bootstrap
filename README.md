# Sadata Laravel Bootstrap

Bootstrap 5 UI theme package for Sadata Laravel applications. A clean, modern, and lightweight alternative to Metronic-based themes.

## Features

- **Bootstrap 5.3.3** — Latest Bootstrap with modern utilities
- **Sadata Brand Colors** — Primary `#E31937`, Secondary `#007BFF`
- **Ready-made Components** — Sidebar, header, cards, tables, modals
- **ThemeManager Compatible** — Works with `Sadata\Core\Support\UI\ThemeManager`
- **MIT Licensed** — No proprietary theme restrictions

## Installation

### 1. Require via Composer

```bash
composer require sadata/sadata-laravel-bootstrap
```

### 2. Publish Assets (Optional)

```bash
php artisan vendor:publish --provider="Sadata\Bootstrap\Providers\SadataBootstrapServiceProvider"
```

### 3. Configure Theme

In your `config/sadata_ui.php`, set:

```php
'active_template' => 'bootstrap',
```

Or directly in `.env`:

```env
SADATA_UI_ACTIVE_TEMPLATE=bootstrap
```

## Components

### Layouts

- `sadata-bootstrap::layouts.app` — Main admin layout with sidebar
- `sadata-bootstrap::layouts.public` — Public/auth pages wrapper
- `sadata-bootstrap::auth.login` — Login page

### Theme Components

- `sadata-bootstrap::components.theme.bootstrap.sidebar` — Sidebar navigation
- `sadata-bootstrap::components.theme.bootstrap.header-status` — Header status bar
- `sadata-bootstrap::components.theme.bootstrap.toolbar-context` — Toolbar context area

### Master Data Components

- `sadata-bootstrap::components.theme.bootstrap.master-data.card` — Card wrapper
- `sadata-bootstrap::components.theme.bootstrap.master-data.toolbar` — Page toolbar
- `sadata-bootstrap::components.theme.bootstrap.master-data.table` — Data table
- `sadata-bootstrap::components.theme.bootstrap.master-data.filter-panel` — Filter controls
- `sadata-bootstrap::components.theme.bootstrap.master-data.side-form-panel` — Slide-in form
- `sadata-bootstrap::components.theme.bootstrap.master-data.summary-strip` — Stats strip
- `sadata-bootstrap::components.theme.bootstrap.master-data.workspace-switcher` — Workspace dropdown
- `sadata-bootstrap::components.theme.bootstrap.master-data.workspace-context` — Workspace header
- `sadata-bootstrap::components.theme.bootstrap.master-data.pivot-workspace` — Workspace grid
- `sadata-bootstrap::components.theme.bootstrap.master-data.export-modal` — Export dialog

## Usage Example

```blade
@extends('sadata-bootstrap::layouts.app')

@section('title', 'Tickets')

@section('content')
    <x-theme.master-data.toolbar
        :title="'Tickets'"
        :eyebrow="'Master Data'"
        :actions="[['label' => 'New Ticket', 'url' => route('tickets.create')]]"
    />

    <x-theme.master-data.table :columns="$columns" :rows="$tickets" />
@endsection
```

## License

MIT License. See [LICENSE](LICENSE) for details.
