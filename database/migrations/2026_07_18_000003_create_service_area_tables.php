<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('states', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->timestamps();
        });

        Schema::create('cities', function (Blueprint $table) {
            $table->id();
            $table->foreignId('state_id')->constrained()->cascadeOnDelete();
            $table->string('name');
            $table->string('slug');
            $table->timestamps();
            $table->unique(['state_id', 'slug']);
        });

        Schema::create('neighbourhoods', function (Blueprint $table) {
            $table->id();
            $table->foreignId('state_id')->constrained()->cascadeOnDelete();
            $table->foreignId('city_id')->constrained()->cascadeOnDelete();
            $table->string('name');
            $table->string('slug');
            $table->string('summary')->nullable();
            $table->string('banner_image')->nullable();
            $table->string('main_image')->nullable();
            $table->string('side_image_one')->nullable();
            $table->string('side_image_two')->nullable();
            $table->unsignedSmallInteger('days')->default(4);
            $table->unsignedSmallInteger('nights')->default(3);
            $table->decimal('price', 10, 2)->default(199);
            $table->longText('description')->nullable();
            $table->longText('overview')->nullable();
            $table->json('tour_plan')->nullable();
            $table->json('highlights')->nullable();
            $table->json('inclusions')->nullable();
            $table->json('exclusions')->nullable();
            $table->boolean('status')->default(true);
            $table->timestamps();
            $table->unique(['city_id', 'slug']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('neighbourhoods');
        Schema::dropIfExists('cities');
        Schema::dropIfExists('states');
    }
};
