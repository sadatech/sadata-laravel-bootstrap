@props([
    'config' => [],
])

@php
    $module = $config['module'] ?? 'module';
    $singular = $config['singular'] ?? \Illuminate\Support\Str::singular($module);
    $columns = collect(data_get($config, 'columns.definitions', []))
        ->where('visible', true)
        ->values();
    $exportsEnabled = data_get($config, 'exports.enabled', true);
    $importsEnabled = filled(data_get($config, 'routes.importsIndex'));
@endphp

<x-ui.toolbar
    :search-id="$singular.'-table-search'"
    :search-placeholder="data_get($config, 'datatable.searchPlaceholder')"
    :add-button-id="$singular.'-form-open'"
    :add-label="data_get($config, 'labels.add')"
    :export-button-id="$exportsEnabled ? $singular.'-export-button' : null"
    export-label="Unduh CSV"
    :export-url="$exportsEnabled ? data_get($config, 'routes.exportsStore') : null"
    :logs-target="$exportsEnabled ? '#'.$singular.'-export-history-modal' : null"
    logs-label="Riwayat export"
    :import-logs-target="$importsEnabled ? '#'.$singular.'-import-history-modal' : null"
    import-logs-label="Riwayat import"
>
    <div class="d-flex flex-wrap gap-2 align-items-center">
    @if (data_get($config, 'views.enabled', true))
        <button type="button" class="btn btn-outline-secondary btn-sm d-inline-flex align-items-center gap-2" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="bi bi-sliders"></i>
            <span>Tampilan</span>
        </button>
        <div class="dropdown-menu dropdown-menu-end p-3" style="min-width: 20rem">
            <div class="fw-semibold mb-2">Kolom yang ditampilkan</div>
            <div class="d-flex flex-column gap-2" data-column-chooser="{{ $module }}">
                @foreach ($columns as $index => $column)
                    @php
                        $key = $column['key'] ?? $column['data'] ?? null;
                        $label = $column['label'] ?? $column['title'] ?? $key;
                    @endphp
                    @if ($key)
                        <label class="form-check">
                            <input class="form-check-input" type="checkbox" value="{{ $key }}" data-column-toggle data-column-index="{{ $index }}" @checked(in_array($key, data_get($config, 'columns.visible', []), true))>
                            <span class="form-check-label">{{ $label }}</span>
                        </label>
                    @endif
                @endforeach
            </div>
        </div>
    @endif
    </div>
</x-ui.toolbar>
