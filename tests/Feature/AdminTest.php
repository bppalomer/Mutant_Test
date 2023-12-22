<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\User;
use Tests\TestCase;

class AdminTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_admin_view_user_list(): void
    {
        $admin = User::factory()->create(['usertype' => 'admin']);

        $response = $this->actingAs($admin)->get(route('viewUserInfo'));

        $response->assertStatus(200);
    }

    public function test_admin_update_user_list(): void
    {
        $user = User::factory()->create();
        $admin = User::factory()->create(['usertype' => 'admin']);

        $response = $this->actingAs($admin)->get(route('updateUser', ['userId' => $user->id]));

        $updatedUserData = [
            'name' => 'Updated Name',
            'email' => 'updated@example.com',
            'usertype' => 'user',
        ];

        $response = $this->patch(route('saveUpdatedUser', ['userId' => $user->id]), $updatedUserData);
        $response->assertRedirect();

        $this->assertDatabaseHas('users', $updatedUserData);
    }

    public function test_admin_delete_user_list(): void
    {
        $user = User::factory()->create();
        $admin = User::factory()->create(['usertype' => 'admin']);

        $response = $this->actingas($admin)->delete(route('deleteUser', ['userId' => $user->id]));
        $response->assertRedirect();

        $this->assertDatabaseMissing('users', ['id' => $user->id]);
    }
}
