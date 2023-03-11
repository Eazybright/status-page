<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;

test('bash script is created', function () {
    Artisan::call('status-page:copy-script');
    $this->assertTrue(File::exists(base_path('health-check.sh')));
});

test('routes is crawled', function () {
    Artisan::call('status-page:generate-route');
    $this->assertTrue(File::exists(public_path('urls.cfg')));
});

test('Status page is available', function () {
    Artisan::call('status-page:create');
    $this->get('status-page')
        ->assertStatus(200)
        ->assertSee('System Status');
});
