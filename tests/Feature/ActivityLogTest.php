<?php

namespace Tests\Feature;

use App\Models\ActivityLog;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ActivityLogTest extends TestCase
{
    use RefreshDatabase;

    public function test_successful_management_actions_are_logged(): void
    {
        $admin = User::factory()->create([
            'name' => 'Site Admin',
            'role' => User::ROLE_ADMIN,
        ]);

        $this->actingAs($admin)->post(route('users.store'), [
            'name' => 'Content Author',
            'email' => 'activity-author@example.com',
            'role' => User::ROLE_AUTHOR,
            'status' => '1',
            'password' => 'password',
            'password_confirmation' => 'password',
        ])->assertRedirect(route('users.index'));

        $log = ActivityLog::query()->sole();

        $this->assertSame($admin->id, $log->user_id);
        $this->assertSame('Site Admin', $log->user_name);
        $this->assertSame('created', $log->action);
        $this->assertSame('Users', $log->area);
        $this->assertContains('name', $log->changed_fields);
        $this->assertNotContains('password', $log->changed_fields);
    }

    public function test_admin_can_view_activity_log_but_author_cannot(): void
    {
        $admin = User::factory()->create(['role' => User::ROLE_ADMIN]);
        $author = User::factory()->create(['role' => User::ROLE_AUTHOR]);

        ActivityLog::create([
            'user_id' => $admin->id,
            'user_name' => $admin->name,
            'user_email' => $admin->email,
            'action' => 'updated',
            'area' => 'Service Areas / Cities',
            'description' => 'Updated a city',
            'method' => 'PATCH',
            'url' => '/cities/1',
        ]);

        $this->actingAs($admin)
            ->get(route('activity-logs.index'))
            ->assertOk()
            ->assertSee('Activity Log')
            ->assertSee('Service Areas / Cities');

        $this->actingAs($author)
            ->get(route('activity-logs.index'))
            ->assertForbidden();
    }

    public function test_failed_validation_is_not_logged(): void
    {
        $admin = User::factory()->create(['role' => User::ROLE_ADMIN]);

        $this->actingAs($admin)
            ->from(route('users.create'))
            ->post(route('users.store'), [])
            ->assertRedirect(route('users.create'));

        $this->assertDatabaseCount('activity_logs', 0);
    }

    public function test_successful_login_is_recorded_for_admin_review(): void
    {
        $user = User::factory()->create([
            'name' => 'Login Subscriber',
            'role' => User::ROLE_SUBSCRIBER,
        ]);

        $this->post(route('login'), [
            'email' => $user->email,
            'password' => 'password',
        ])->assertRedirect(route('dashboard', absolute: false));

        $this->assertDatabaseHas('activity_logs', [
            'user_id' => $user->id,
            'action' => 'logged in to',
            'area' => 'Authentication',
            'route_name' => 'login',
        ]);
    }
}
