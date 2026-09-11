<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('menu_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('menu_id')->constrained('menus')->cascadeOnDelete();
            $table->foreignId('parent_id')->nullable()->constrained('menu_items')->cascadeOnDelete();
            $table->string('label', 255);
            $table->string('url', 500);
            $table->string('icon', 50)->nullable();
            $table->integer('position')->default(0);
            $table->boolean('is_active')->default(true);
            $table->string('target', 20)->default('_self');
            $table->timestamps();

            $table->index('menu_id');
            $table->index('parent_id');
            $table->index('position');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('menu_items');
    }
};