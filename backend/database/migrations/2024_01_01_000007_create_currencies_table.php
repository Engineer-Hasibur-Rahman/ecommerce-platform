<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('currencies', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('code', 3)->unique();
            $table->string('symbol', 5);
            $table->integer('decimal_places')->default(2);
            $table->string('decimal_separator', 1)->default('.');
            $table->string('thousands_separator', 1)->default(',');
            $table->enum('symbol_position', ['before', 'after'])->default('after');
            $table->boolean('is_active')->default(true);
            $table->boolean('is_default')->default(false);
            $table->integer('position')->default(0);
            $table->timestamps();

            $table->index('code');
            $table->index('is_active');
            $table->index('is_default');
            $table->index('position');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('currencies');
    }
};