<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class HasSettingsTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function it_can_set_a_user_setting()
    {
        $user = User::factory()->create();

        $user->setSetting('theme', 'dark');

        $this->assertEquals('dark', $user->getSetting('theme'));
        $this->assertDatabaseHas('users', [
            'id' => $user->id,
            'settings' => json_encode(['theme' => 'dark']),
        ]);
    }

    #[Test]
    public function it_can_get_a_user_setting()
    {
        $user = User::factory()->create(['settings' => ['lang' => 'en']]);

        $this->assertEquals('en', $user->getSetting('lang'));
    }

    #[Test]
    public function it_returns_null_if_setting_does_not_exist()
    {
        $user = User::factory()->create();

        $this->assertNull($user->getSetting('nonexistent_key'));
    }

    #[Test]
    public function it_can_remove_a_user_setting()
    {
        $user = User::factory()->create(['settings' => ['lang' => 'en', 'theme' => 'dark']]);

        $user->removeSetting('lang');

        $this->assertNull($user->getSetting('lang'));
        $this->assertEquals(['theme' => 'dark'], $user->settings);
    }

    #[Test]
    public function it_preserves_other_settings_when_removing_a_setting()
    {
        $user = User::factory()->create(['settings' => ['lang' => 'fr', 'mode' => 'light']]);

        $user->removeSetting('lang');

        $this->assertNull($user->getSetting('lang'));
        $this->assertEquals(['mode' => 'light'], $user->settings);
    }
}
