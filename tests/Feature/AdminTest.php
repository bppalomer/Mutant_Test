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
        $user = User::factory()->create(['usertype' => 'user']);
        $admin = User::factory()->create(['usertype' => 'admin']);

        $oldUserData = [
            'name' => $user->name,
            'email' => $user->email,
            'usertype' => $user->usertype,
        ];

        $newUserData = [
            'name' => fake()->name(),
            'email' => fake()->unique()->email(),
            'usertype' => 'admin',
        ];

        $response = $this->actingAs($admin)->patch(route('saveUpdatedUser', ['userId' => $user->id]), $newUserData);

        $response->assertRedirect();

        $response = $this->followRedirects($response);
        $response->assertStatus(200);

        $newUserData = User::find($user->id);
        $this->assertNotEquals($oldUserData['name'], $newUserData->name);
        $this->assertNotEquals($oldUserData['email'], $newUserData->email);
        $this->assertNotEquals($oldUserData['usertype'], $newUserData->usertype);
    }

    public function test_admin_delete_user_list(): void
    {
        $user = User::factory()->create();
        $admin = User::factory()->create(['usertype' => 'admin']);

        $response = $this->actingas($admin)->delete(route('deleteUser', ['userId' => $user->id]));
        $response->assertRedirect();

        $this->assertDatabaseMissing('users', ['id' => $user->id]);
    }

    public function test_admin_create_product(): void
    {
        $admin = User::factory()->create(['usertype' => 'admin']);

        $productData = [
            'productName' => 'Test Product',
            'productPrice' => 10.99,
            'productDescription' => 'This is a test product.',
        ];

        $response = $this->actingAs($admin)->post(route('submitFormToAddProducts'), $productData);

        $response->assertRedirect(route('home'))
            ->assertSessionHas('success', 'Product added successfully!');

        $this->assertDatabaseHas('products', $productData);

    }
}
