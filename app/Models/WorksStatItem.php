<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class WorksStatItem extends Model
{
    protected $table = 'works_stat_items';

    protected $fillable = [
        'works_stats_id',
        'icon_svg',
        'color',
        'number',
        'label',
        'order',
    ];

    public function stats(): BelongsTo
    {
        return $this->belongsTo(WorksStats::class);
    }
}
