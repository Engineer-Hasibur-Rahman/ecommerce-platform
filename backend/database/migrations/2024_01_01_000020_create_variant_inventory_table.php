<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('variant_inventory', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_variant_id')->unique()->constrained('product_variants')->cascadeOnDelete();
            $table->integer('quantity_in_stock')->default(0);
            $table->integer('quantity_reserved')->default(0);
            $table->boolean('sku_tracking')->default(true);
            $table->timestamps();

            $table->index('product_variant_id');
            $table->index('quantity_in_stock');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('variant_inventory');
    }
};