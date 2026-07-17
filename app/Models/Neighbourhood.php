<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Neighbourhood extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected function casts(): array
    {
        return ['tour_plan' => 'array', 'highlights' => 'array', 'inclusions' => 'array', 'exclusions' => 'array', 'status' => 'boolean', 'price' => 'decimal:2'];
    }

    public function state(): BelongsTo { return $this->belongsTo(State::class); }
    public function city(): BelongsTo { return $this->belongsTo(City::class); }

    public function imageUrl(string $field, string $fallback): string
    {
        $path = $this->getAttribute($field);
        if (! $path) return $fallback;

        return Str::startsWith($path, ['http://', 'https://']) ? $path : Storage::disk('public')->url($path);
    }
}
