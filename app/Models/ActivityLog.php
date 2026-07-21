<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ActivityLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'user_name',
        'user_email',
        'action',
        'area',
        'subject',
        'description',
        'method',
        'route_name',
        'url',
        'changed_fields',
        'ip_address',
        'user_agent',
    ];

    protected function casts(): array
    {
        return [
            'changed_fields' => 'array',
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
