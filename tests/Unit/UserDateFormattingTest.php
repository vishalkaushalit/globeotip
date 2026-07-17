<?php

namespace Tests\Unit;

use App\Models\User;
use Carbon\CarbonImmutable;
use Tests\TestCase;

class UserDateFormattingTest extends TestCase
{
    public function test_it_formats_a_date_in_the_application_timezone(): void
    {
        config(['app.timezone' => 'Asia/Kolkata']);

        $date = CarbonImmutable::parse('2026-07-18 12:00:00', 'UTC');

        $this->assertSame('Jul 18, 2026 05:30 PM', User::formatLocalDateTime($date));
    }

    public function test_it_returns_the_given_fallback_for_a_missing_date(): void
    {
        $this->assertSame('Never', User::formatLocalDateTime(null, 'Never'));
    }
}
