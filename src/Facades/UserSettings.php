<?php

namespace IurieMalai\UserSettings\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \IurieMalai\UserSettings\UserSettings
 */
class UserSettings extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \IurieMalai\UserSettings\UserSettings::class;
    }
}
