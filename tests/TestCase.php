<?php

namespace Sadata\Bootstrap\Tests;

use Orchestra\Testbench\TestCase as BaseTestCase;

class TestCase extends BaseTestCase
{
    protected function getPackageProviders($app)
    {
        return [
            \Sadata\Bootstrap\Providers\SadataBootstrapServiceProvider::class,
        ];
    }

    protected function getEnvironmentSetUp($app)
    {
        $app['config']->set('app.key', 'base64:test-key-for-testing-purposes-only');
        $app['config']->set('view.paths', [
            __DIR__ . '/../resources/views',
        ]);
    }
}
