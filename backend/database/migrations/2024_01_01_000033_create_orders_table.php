<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('order_number', 50)->unique();
            $table->foreignId('user_id')->constrained('users')->restrictOnDelete();
            $table->enum('status', ['pending', 'confirmed', 'processing', 'packed', 'shipped', 'delivered', 'cancelled', 'returned', 'refunded'])->default('pending');
            $table->enum('payment_status', ['unpaid', 'paid', 'partial', 'refunded'])->default('unpaid');
            $table->foreignId('shipping_method_id')->nullable()->constrained('shipping_methods')->setNullOnDelete();
            $table->foreignId('coupon_id')->nullable()->constrained('coupons')->setNullOnDelete();
            $table->decimal('subtotal', 14, 2);
            $table->decimal('discount_amount', 14, 2)->default(0);
            $table->decimal('shipping_amount', 14, 2)->default(0);
            $table->decimal('tax_amount', 14, 2)->default(0);
            $table->decimal('total', 14, 2);
            $table->foreignId('shipping_address_id')->constrained('addresses')->restrictOnDelete();
            $table->foreignId('billing_address_id')->constrained('addresses')->restrictOnDelete();
            $table->text('customer_note')->nullable();
            $table->text('admin_note')->nullable();
            $table->string('shipping_tracking_number', 100)->nullable();
            $table->date('estimated_delivery_date')->nullable();
            $table->timestamps();

            $table->index('order_number');
            $table->index('user_id');
            $table->index('status');
            $table->index('payment_status');
            $table->index('created_at');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};