<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ShippingZone extends Model
{
    protected $fillable = [
        'shipping_method_id',
        'name',
        'country_code',
        'state_province',
        'city',
        'postal_code_from',
        'postal_code_to',
        'additional_charge',
        'free_shipping_threshold',
        'is_active',
    ];

    protected $casts = [
        'additional_charge' => 'decimal:2',
        'free_shipping_threshold' => 'decimal:2',
        'is_active' => 'boolean',
    ];

    public function shippingMethod(): BelongsTo
    {
        return $this->belongsTo(ShippingMethod::class);
    }
}
