<?php

namespace Tests\Unit;

use App\Models\User;
use PHPUnit\Framework\TestCase;

class UserRoleTest extends TestCase
{
    public function test_admin_role_is_recognized_as_an_admin(): void
    {
        $user = new User(['role' => User::ROLE_ADMIN]);

        $this->assertTrue($user->isAdmin());
    }

    public function test_author_is_not_recognized_as_an_admin(): void
    {
        $user = new User(['role' => User::ROLE_AUTHOR]);

        $this->assertFalse($user->isAdmin());
        $this->assertTrue($user->isAuthor());
    }

    public function test_admin_and_editor_can_manage_service_areas(): void
    {
        $admin = new User(['role' => User::ROLE_ADMIN]);
        $editor = new User(['role' => User::ROLE_EDITOR]);
        $subscriber = new User(['role' => User::ROLE_SUBSCRIBER]);

        $this->assertTrue($admin->canManageServiceAreas());
        $this->assertTrue($editor->canManageServiceAreas());
        $this->assertFalse($subscriber->canManageServiceAreas());
        $this->assertTrue($subscriber->isSubscriber());
    }
}
