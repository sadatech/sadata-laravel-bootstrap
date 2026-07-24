<?php

use Sadata\Bootstrap\Tests\TestCase;

uses(TestCase::class);

test('bootstrap service provider registers views namespace', function () {
    $viewFinder = app('view.finder');
    $paths = $viewFinder->getPaths();

    $hasBootstrapPath = false;
    foreach ($paths as $path) {
        if (str_contains($path, 'sadata-laravel-bootstrap')) {
            $hasBootstrapPath = true;
            break;
        }
    }

    expect($hasBootstrapPath)->toBeTrue();
});

test('bootstrap theme config is loaded', function () {
    $config = config('sadata_ui_bootstrap');

    expect($config)->toBeArray();
    expect($config['primary_color'])->toBe('#E31937');
    expect($config['secondary_color'])->toBe('#007BFF');
});

test('login view renders without errors', function () {
    $html = view('sadata-bootstrap::auth.login')->render();

    expect($html)->toContain('Sadata');
    expect($html)->toContain('Sign in');
    expect($html)->toContain('email');
    expect($html)->toContain('password');
});

test('app layout view renders without errors', function () {
    $html = view('sadata-bootstrap::layouts.app', [
        'title' => 'Test Page',
    ])->render();

    expect($html)->toContain('Sadata');
    expect($html)->toContain('Test Page');
    expect($html)->toContain('sidebar');
});

test('public layout view renders without errors', function () {
    $html = view('sadata-bootstrap::layouts.public', [
        'title' => 'Public Page',
    ])->render();

    expect($html)->toContain('Sadata');
    expect($html)->toContain('Public Page');
});
