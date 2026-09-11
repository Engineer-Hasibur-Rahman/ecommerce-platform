<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('shipping_zones', function (Blueprint $table) {
            $table->id();
            $table->foreignId('shipping_method_id')->constrained('shipping_methods')->cascadeOnDelete();
            $table->string('name', 255);
            $table->string('country_code', 2)->nullable();
            $table->string('state_province', 100)->nullable();
            $table->string('city', 100)->nullable();
            $table->string('postal_code_from', 20)->nullable();
            $table->string('postal_code_to', 20)->nullable();
            $table->decimal('additional_charge', 12, 2)->default(0);
            $table->decimal('free_shipping_threshold', 14, 2)->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();

            $table->index('shipping_method_id');
            $table->index('country_code');
            $table->index('is_active');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('shipping_zones');
    }
};