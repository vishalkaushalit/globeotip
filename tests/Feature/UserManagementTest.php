<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserManagementTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_can_view_and_create_authors(): void
    {
        $admin = User::factory()->create(['role' => User::ROLE_ADMIN]);

        $this->actingAs($admin)->get(route('users.index'))->assertOk();

        $this->actingAs($admin)->post(route('users.store'), [
            'name' => 'Content Author',
            'email' => 'author@example.com',
            'role' => User::ROLE_AUTHOR,
            'status' => '1',
            'password' => 'password',
            'password_confirmation' => 'password',
        ])->assertRedirect(route('users.index'));

        $this->assertDatabaseHas('users', ['email' => 'author@example.com', 'role' => User::ROLE_AUTHOR]);
    }

    public function test_author_cannot_manage_users(): void
    {
        $author = User::factory()->create(['role' => User::ROLE_AUTHOR]);

        $this->actingAs($author)->get(route('users.index'))->assertForbidden();
    }

    public function test_dashboard_displays_the_authenticated_users_profile(): void
    {
        $author = User::factory()->create([
            'name' => 'Dashboard Author',
            'role' => User::ROLE_AUTHOR,
            'status' => true,
            'profile_image' => 'authors/profile.jpg',
        ]);

        $this->actingAs($author)
            ->get(route('dashboard'))
            ->assertOk()
            ->assertSee('Dashboard Author')
            ->assertSee('authors/profile.jpg')
            ->assertSee('Account Status')
            ->assertSee('My Profile')
            ->assertDontSee(route('users.index'));
    }

    public function test_admin_sidebar_displays_user_management(): void
    {
        $admin = User::factory()->create(['role' => User::ROLE_ADMIN]);

        $this->actingAs($admin)
            ->get(route('dashboard'))
            ->assertOk()
            ->assertSee(route('users.index'))
            ->assertSee('Administration');
    }
}
