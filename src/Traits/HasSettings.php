<?php

namespace IurieMalai\UserSettings\Traits;

use Illuminate\Database\Eloquent\Casts\AsArrayObject;

trait HasSettings
{
    protected function castSettingsAttribute(): array
    {
        return $this->settings ?? [];
    }

    public function getSetting(string $key, $default = null)
    {
        return $this->settings[$key] ?? $default;
    }

    public function setSetting(string $key, $value): void
    {
        $settings = $this->settings;
        $settings[$key] = $value;
        $this->settings = $settings;
        $this->save();
    }
}
