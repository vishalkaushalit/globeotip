<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        $columns = [
            'age' => fn (Blueprint $table) => $table->unsignedTinyInteger('age')->nullable()->after('name'),
            'experience' => fn (Blueprint $table) => $table->string('experience')->nullable()->after('age'),
            'bio' => fn (Blueprint $table) => $table->text('bio')->nullable()->after('experience'),
            'social_media_profile' => fn (Blueprint $table) => $table->string('social_media_profile')->nullable()->after('bio'),
            'contact_number' => fn (Blueprint $table) => $table->string('contact_number', 30)->nullable()->after('social_media_profile'),
            'profile_image' => fn (Blueprint $table) => $table->string('profile_image')->nullable()->after('contact_number'),
            'status' => fn (Blueprint $table) => $table->boolean('status')->default(true)->after('role'),
            'last_login_at' => fn (Blueprint $table) => $table->dateTime('last_login_at')->nullable()->after('status'),
        ];

        foreach ($columns as $column => $definition) {
            if (! Schema::hasColumn('users', $column)) {
                Schema::table('users', $definition);
            }
        }
    }

    public function down(): void
    {
        $columns = array_filter(
            ['age', 'experience', 'bio', 'social_media_profile', 'contact_number', 'profile_image', 'status', 'last_login_at'],
            fn (string $column) => Schema::hasColumn('users', $column)
        );

        if ($columns) {
            Schema::table('users', fn (Blueprint $table) => $table->dropColumn($columns));
        }
    }
};
