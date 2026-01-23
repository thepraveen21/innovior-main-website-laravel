<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CareersOpening extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'job_type',
        'location',
        'is_active',
        'order',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];
}
