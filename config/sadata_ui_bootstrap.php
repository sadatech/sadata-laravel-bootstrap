<?php

return [
    'active' => true,

    'routes' => [
        'dashboard' => 'dashboard',
        'login' => 'login',
        'login_submit' => 'login.store',
        'logout' => 'logout',
    ],

    'brand' => [
        'primary' => '#E31937',
        'secondary' => '#007BFF',
        'success' => '#28a745',
        'danger' => '#dc3545',
        'warning' => '#ffc107',
        'info' => '#17a2b8',
        'dark' => '#343a40',
        'light' => '#f8f9fa',
    ],

    'layout' => [
        'sidebar_width' => '260px',
        'sidebar_collapsed' => false,
        'header_height' => '60px',
        'container_max_width' => '1320px',
    ],

    'templates' => [
        'bootstrap' => [
            'blade' => [
                'layout' => 'layouts.app',
                'master_data_page_component' => 'x-master-data.page',
                'forms_prefix' => 'x-forms',
            ],
            'components' => [
                'sidebar' => 'theme.bootstrap.sidebar',
                'header_status' => 'theme.bootstrap.header-status',
                'toolbar_context' => 'theme.bootstrap.toolbar-context',
                'master_data' => [
                    'summary_strip' => 'theme.bootstrap.master-data.summary-strip',
                    'filter_panel' => 'theme.bootstrap.master-data.filter-panel',
                    'side_form_panel' => 'theme.bootstrap.master-data.side-form-panel',
                    'card' => 'theme.bootstrap.master-data.card',
                    'workspace_context' => 'theme.bootstrap.master-data.workspace-context',
                    'workspace_switcher' => 'theme.bootstrap.master-data.workspace-switcher',
                    'toolbar' => 'theme.bootstrap.master-data.toolbar',
                    'table' => 'theme.bootstrap.master-data.table',
                    'pivot_workspace' => 'theme.bootstrap.master-data.pivot-workspace',
                    'export_modal' => 'theme.bootstrap.master-data.export-modal',
                    'import_modal' => 'theme.bootstrap.master-data.import-modal',
                ],
            ],
            'assets' => [
                'theme' => [
                    'favicon' => 'assets/favicon.ico',
                    'styles' => [
                        'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css',
                        'https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css',
                    ],
                    'host_url' => '',
                    'scripts' => [
                        'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js',
                        'assets/js/sadata-ui.js',
                        'assets/js/sadata-master-page.js',
                        'assets/js/modules/MasterDataTable.js',
                    ],
                ],
                'auth' => [
                    'background_image' => 'assets/media/misc/auth-bg.png',
                ],
                'master_data' => [
                    'scripts' => [
                        'assets/js/modules/MasterDataTable.js',
                        'assets/js/modules/MasterFormPanel.js',
                        'assets/js/modules/ConfirmDelete.js',
                        'assets/js/modules/MasterDataViews.js',
                        'assets/js/modules/MasterDataPivot.js',
                        'assets/js/modules/MasterDataPage.js',
                    ],
                ],
            ],
            'content' => [
                'header_status' => [
                    'eyebrow' => 'Status',
                    'title' => 'Dashboard',
                    'icon' => 'bi-speedometer2',
                ],
                'toolbar_context' => [
                    'badge' => 'Active',
                    'description' => 'Operational dashboard and master data management.',
                ],
            ],
        ],
    ],
];
