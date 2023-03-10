<?php

namespace Eazybright\StatusPage\Tests;

use Eazybright\StatusPage\StatusPageServiceProvider;
use Illuminate\Support\Facades\File;
use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
    protected function setUp(): void
    {
        parent::setUp();
    }

    protected function getPackageProviders($app)
    {
        return [
            StatusPageServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app)
    {
        config()->set('database.default', 'testing');
        File::put(public_path('urls.cfg'), 'Url contents');
        File::put(base_path('health-check.sh'), 'bash script');
    }
}
