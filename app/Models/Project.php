<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Project extends Model
{
    protected $table = 'projects';

    protected $fillable = [
        'category_id',
        'title',
        'description',
        'image',
        'client',
        'duration',
        'link',
        'order',
        'is_active',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(ProjectCategory::class);
    }
}
