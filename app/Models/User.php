<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Carbon\Carbon;
use DateTimeInterface;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Authenticatable
{
    public const ROLE_ADMIN = 'admin';

    public const ROLE_AUTHOR = 'author';

    public const ROLE_EDITOR = 'editor';

    public const ROLE_SUBSCRIBER = 'subscriber';

    public const ROLES = [
        self::ROLE_ADMIN => 'Admin',
        self::ROLE_AUTHOR => 'Author',
        self::ROLE_EDITOR => 'Editor',
        self::ROLE_SUBSCRIBER => 'Subscriber',
    ];

    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'age',
        'experience',
        'bio',
        'social_media_profile',
        'contact_number',
        'email',
        'profile_image',
        'password',
        'role',
        'status',
        'last_login_at',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'age' => 'integer',
            'status' => 'boolean',
            'last_login_at' => 'datetime',
        ];
    }

    /**
     * Format a date and time in the application's local timezone.
     */
    public static function formatLocalDateTime(
        DateTimeInterface|string|null $dateTime,
        string $fallback = 'N/A'
    ): string {
        if ($dateTime === null || $dateTime === '') {
            return $fallback;
        }

        return Carbon::parse($dateTime)
            ->timezone(config('app.timezone'))
            ->format('M d, Y h:i A');
    }

    /**
     * Determine whether the user has administrator access.
     */
    public function isAdmin(): bool
    {
        return $this->hasRole(self::ROLE_ADMIN);
    }

    public function isAuthor(): bool
    {
        return $this->hasRole(self::ROLE_AUTHOR);
    }

    public function isEditor(): bool
    {
        return $this->hasRole(self::ROLE_EDITOR);
    }

    public function isSubscriber(): bool
    {
        return $this->hasRole(self::ROLE_SUBSCRIBER);
    }

    public function canManageServiceAreas(): bool
    {
        return $this->hasRole([self::ROLE_ADMIN, self::ROLE_EDITOR]);
    }

    public function hasRole(string|array $roles): bool
    {
        return in_array($this->role, (array) $roles, true);
    }

    public function activityLogs(): HasMany
    {
        return $this->hasMany(ActivityLog::class);
    }
}
