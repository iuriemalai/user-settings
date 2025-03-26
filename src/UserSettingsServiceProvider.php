<?php

namespace IurieMalai\UserSettings;

use IurieMalai\UserSettings\Commands\UserSettingsCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class UserSettingsServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('user-settings')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_user_settings_table')
            ->hasCommand(UserSettingsCommand::class);
    }

    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
    }
}
