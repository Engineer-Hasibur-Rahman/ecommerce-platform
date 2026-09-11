<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('coupon_usages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('coupon_id')->constrained('coupons')->cascadeOnDelete();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('order_id')->nullable()->constrained('orders')->setNullOnDelete();
            $table->timestamp('used_at')->useCurrent();

            $table->unique(['coupon_id', 'user_id', 'order_id']);
            $table->index('coupon_id');
            $table->index('user_id');
            $table->index('used_at');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('coupon_usages');
    }
};