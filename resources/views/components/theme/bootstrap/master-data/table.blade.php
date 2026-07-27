@props([
    'config' => [],
])

@php
    $module = $config['module'] ?? 'module';
    $columns = data_get($config, 'datatable.columns', []);
@endphp

<div class="position-relative" data-master-table-shell>
    <div class="table-responsive">
        <table id="{{ $module }}-datatable" class="table table-hover align-middle">
            <thead>
                <tr>
                    @foreach ($columns as $column)
                        <th class="{{ $column['className'] ?? '' }}">{{ $column['title'] ?? $column['data'] ?? '' }}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>
</div>
