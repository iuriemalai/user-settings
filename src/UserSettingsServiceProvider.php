<?php

namespace IurieMalai\UserSettings;

use IurieMalai\UserSettings\Commands\UserSettingsCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class UserSettingsServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('user-settings')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_user_settings_table')
            ->hasCommand(UserSettingsCommand::class);
    }

    public function boot()
    {
        // Correct migration path from src folder to database/migrations
        $this->publishes([
            __DIR__.'/../../database/migrations/create_user_settings_table.php' => database_path('migrations/'.date('Y_m_d_His').'_create_user_settings_table.php'),
        ], 'user-settings-migrations');

        // Load migrations from the correct path
        $this->loadMigrationsFrom(__DIR__.'/../../database/migrations');
    }
}
