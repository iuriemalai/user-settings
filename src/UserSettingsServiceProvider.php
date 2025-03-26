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
            ->name("user-settings")
            ->hasConfigFile()
            ->hasMigration("add_settings_to_users_table");
    }

    public function boot()
    {
        $timestamp = date("Y_m_d_His");
        $migrationFile = __DIR__ . "/../database/migrations/add_settings_to_users_table.php";
        $destination = database_path("migrations/{$timestamp}_add_settings_to_users_table.php");

        $this->publishes([
            $migrationFile => $destination,
        ], "user-settings-migrations");

        $this->loadMigrationsFrom(__DIR__ . "../database/migrations");
    }
}
