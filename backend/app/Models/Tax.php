<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tax extends Model
{
    protected $fillable = [
        'name',
        'code',
        'rate',
        'type',
        'applicable_to_shipping',
        'is_compound',
        'is_active',
    ];

    protected $casts = [
        'rate' => 'decimal:2',
        'applicable_to_shipping' => 'boolean',
        'is_compound' => 'boolean',
        'is_active' => 'boolean',
    ];
}
