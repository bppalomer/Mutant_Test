<?php

namespace Tests\Feature;

use App\Models\User;
use Tests\TestCase;

class UserTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_user_login(): void
    {
        $user = User::factory()->create(['usertype' => 'user']);

        $response = $this ->actingAs($user)->get(route('home'));

        $response->assertViewIs('dashboard');
    }

    public function test_admin_login(): void
    {
        $user = User::factory()->create(['usertype' => 'admin']);

        $response = $this ->actingAs($user)->get(route('home'));

        $response->assertViewIs('admin.admin');
    }
}

