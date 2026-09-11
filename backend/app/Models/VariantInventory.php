<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class VariantInventory extends Model
{
    protected $table = 'variant_inventory';

    protected $fillable = [
        'product_variant_id',
        'quantity_in_stock',
        'quantity_reserved',
        'sku_tracking',
    ];

    protected $casts = [
        'sku_tracking' => 'boolean',
    ];

    public function variant(): BelongsTo
    {
        return $this->belongsTo(ProductVariant::class, 'product_variant_id');
    }

    public function getQuantityAvailableAttribute(): int
    {
        return $this->quantity_in_stock - $this->quantity_reserved;
    }
}
