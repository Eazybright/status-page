<?php

namespace Eazybright\StatusPage;

define('ROOTPATH', __DIR__);

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Eazybright\StatusPage\Commands\StatusPageCommand;
use Eazybright\StatusPage\Commands\GenerateRouteCommand;
use Eazybright\StatusPage\Commands\CopyBashFileCommand;

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
                CopyBashFileCommand::class
            ]);
    }
}
