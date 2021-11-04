<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserProfileModuleTest extends TestCase
{
    /**
     * @test
     * @testdox Un perfil de usuario pertenece a un usuario.
     */
    function a_user_profile_belongs_to_a_user()
    {
        // $this->markTestIncomplete();

        $user = User::factory()->create();
        $userProfile = UserProfile::factory()->create([
            'website' => 'https://styde.net',
            'user_id' => $user->id,
        ]);

        $this->assertInstanceOf(BelongsTo::class, $userProfile->user());
        $this->assertInstanceOf(User::class, $userProfile->user);
        $this->assertTrue($userProfile->user->is($user));
    }
}
