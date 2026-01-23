<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ServiceFeature extends Model
{
    protected $fillable = [
        'service_detail_id',
        'feature_text',
        'order',
    ];

    public function serviceDetail(): BelongsTo
    {
        return $this->belongsTo(ServiceDetail::class);
    }
}
