<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('carts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained('users')->cascadeOnDelete();
            $table->string('session_token', 255)->nullable();
            $table->decimal('subtotal', 14, 2)->default(0);
            $table->decimal('discount_amount', 14, 2)->default(0);
            $table->decimal('shipping_amount', 14, 2)->default(0);
            $table->decimal('tax_amount', 14, 2)->default(0);
            $table->decimal('total', 14, 2)->default(0);
            $table->foreignId('coupon_id')->nullable()->constrained('coupons')->setNullOnDelete();
            $table->timestamps();
            $table->timestamp('expired_at')->nullable();

            $table->index('user_id');
            $table->index('session_token');
            $table->index('coupon_id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('carts');
    }
};