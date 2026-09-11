<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('attributes', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->string('slug', 255)->unique();
            $table->enum('type', ['select', 'multiselect', 'text', 'color', 'image'])->default('select');
            $table->boolean('is_filterable')->default(false);
            $table->boolean('is_searchable')->default(false);
            $table->integer('position')->default(0);
            $table->timestamps();

            $table->index('slug');
            $table->index('type');
            $table->index('position');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('attributes');
    }
};