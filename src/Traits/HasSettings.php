<?php

namespace IurieMalai\UserSettings\Traits;

use Illuminate\Database\Eloquent\Casts\Attribute;

trait HasSettings
{
    /**
     * Cast the settings attribute to an array.
     */
    protected function settings(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => is_array($value) ? $value : json_decode($value ?: '{}', true),
            set: fn ($value) => json_encode($value),
        );
    }

    /**
     * Get a specific setting or a default value.
     */
    public function getSetting(string $key, mixed $default = null): mixed
    {
        return $this->settings[$key] ?? $default;
    }

    /**
     * Set a specific setting.
     */
    public function setSetting(string $key, mixed $value): void
    {
        $settings = $this->settings;
        $settings[$key] = $value;
        $this->settings = $settings;
        $this->save();
    }

    /**
     * Remove a specific setting.
     */
    public function removeSetting(string $key): void
    {
        $settings = $this->settings;
        unset($settings[$key]);
        $this->settings = $settings;
        $this->save();
    }
}
