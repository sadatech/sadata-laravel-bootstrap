@props([
    'config' => [],
    'imports' => [],
])

@php
    $module = $config['module'] ?? 'module';
    $singular = $config['singular'] ?? \Illuminate\Support\Str::singular($module);
@endphp

<x-ui.import-logs-modal
    id="{{ $singular }}-import-history-modal"
    :title="data_get($config, 'labels.importTitle')"
    description="Riwayat import data untuk modul ini."
    :history-url="data_get($config, 'routes.importsIndex')"
    :refresh-button-id="$singular.'-import-history-refresh'"
    :body-id="$singular.'-import-history-body'"
    :empty-message="data_get($config, 'labels.importEmpty')"
    :imports="$imports"
/>