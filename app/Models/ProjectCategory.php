<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ProjectCategory extends Model
{
    protected $table = 'project_categories';

    protected $fillable = [
        'name',
        'slug',
        'order',
        'is_active',
    ];

    public function projects(): HasMany
    {
        return $this->hasMany(Project::class, 'category_id');
    }
}
