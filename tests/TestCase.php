<?php

namespace VendorName\PackageName\Tests;

use Illuminate\Foundation\Testing\Concerns\InteractsWithViews;

abstract class TestCase extends \Orchestra\Testbench\TestCase
{
    use InteractsWithViews;

    #[\Override]
    protected function setUp(): void
    {
        parent::setUp();

    }

    #[\Override]
    protected function getPackageProviders($app)
    {
        return [
            \VendorName\PackageName\PackageNameServiceProvider::class,
        ];
    }

    #[\Override]
    protected function getEnvironmentSetUp($app)
    {
        $app['config']->set('app.key', 'base64:'.base64_encode(random_bytes(
            $app['config']['app.cipher'] === 'AES-128-CBC' ? 16 : 32
        )));
    }
}
