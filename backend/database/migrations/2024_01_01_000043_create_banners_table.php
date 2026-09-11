<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('banners', function (Blueprint $table) {
            $table->id();
            $table->string('title', 255);
            $table->text('description')->nullable();
            $table->string('image_url', 500);
            $table->string('link_url', 500)->nullable();
            $table->string('alt_text', 255)->nullable();
            $table->enum('type', ['hero', 'promotional', 'category', 'brand'])->default('promotional');
            $table->integer('position')->default(0);
            $table->boolean('is_active')->default(true);
            $table->dateTime('start_date')->nullable();
            $table->dateTime('end_date')->nullable();
            $table->timestamps();

            $table->index('type');
            $table->index('position');
            $table->index('is_active');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('banners');
    }
};