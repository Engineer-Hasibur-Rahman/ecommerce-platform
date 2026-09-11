<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('shipping_methods', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->string('code', 100)->unique();
            $table->text('description')->nullable();
            $table->decimal('base_charge', 12, 2)->default(0);
            $table->decimal('per_km_charge', 12, 2)->nullable();
            $table->integer('estimated_days')->default(3);
            $table->boolean('is_active')->default(true);
            $table->integer('position')->default(0);
            $table->timestamps();

            $table->index('code');
            $table->index('is_active');
            $table->index('position');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('shipping_methods');
    }
};