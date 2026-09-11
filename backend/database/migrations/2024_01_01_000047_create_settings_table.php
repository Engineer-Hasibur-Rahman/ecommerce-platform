<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('category', 100);
            $table->string('key', 100);
            $table->longText('value')->nullable();
            $table->string('type', 50)->default('string');
            $table->timestamps();

            $table->unique(['category', 'key']);
            $table->index('category');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};