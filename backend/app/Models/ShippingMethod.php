<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ShippingMethod extends Model
{
    protected $fillable = [
        'name',
        'code',
        'description',
        'base_charge',
        'per_km_charge',
        'estimated_days',
        'is_active',
        'position',
    ];

    protected $casts = [
        'base_charge' => 'decimal:2',
        'per_km_charge' => 'decimal:2',
        'is_active' => 'boolean',
    ];

    public function zones(): HasMany
    {
        return $this->hasMany(ShippingZone::class);
    }
}
