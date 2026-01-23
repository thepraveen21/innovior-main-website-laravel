<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AboutCultureHighlight extends Model
{
    protected $table = 'about_culture_highlights';

    protected $fillable = [
        'about_culture_id',
        'title',
        'order',
    ];

    public function culture(): BelongsTo
    {
        return $this->belongsTo(AboutCulture::class);
    }
}
