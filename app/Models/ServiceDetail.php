<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ServiceDetail extends Model
{
    protected $fillable = [
        'slug',
        'nav_title',
        'heading',
        'description',
        'image',
        'order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function features(): HasMany
    {
        return $this->hasMany(ServiceFeature::class);
    }
}
