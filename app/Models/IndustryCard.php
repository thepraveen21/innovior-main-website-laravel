<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IndustryCard extends Model
{
    protected $fillable = [
        'title',
        'description',
        'image',
        'link',
        'order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];
}
