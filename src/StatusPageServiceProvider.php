<?php

namespace Eazybright\StatusPage;

define('ROOTPATH', __DIR__);

use Eazybright\StatusPage\Commands\CopyBashFileCommand;
use Eazybright\StatusPage\Commands\GenerateRouteCommand;
use Eazybright\StatusPage\Commands\StatusPageCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class StatusPageServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('status-page')
            ->hasConfigFile()
            ->hasViews()
            ->hasRoute('web')
            ->hasAssets()
            ->hasCommands([
                StatusPageCommand::class,
                GenerateRouteCommand::class,
                CopyBashFileCommand::class,
            ]);
    }
}
