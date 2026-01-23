<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class WorksStats extends Model
{
    protected $table = 'works_stats';

    protected $fillable = [
        'heading',
    ];

    public function items(): HasMany
    {
        return $this->hasMany(WorksStatItem::class);
    }
}
