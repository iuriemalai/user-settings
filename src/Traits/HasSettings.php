<?php

namespace IurieMalai\UserSettings\Traits;

trait HasSettings
{
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
