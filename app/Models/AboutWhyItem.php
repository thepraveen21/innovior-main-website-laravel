<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AboutWhyItem extends Model
{
    protected $table = 'about_why_items';

    protected $fillable = [
        'about_why_id',
        'icon',
        'title',
        'description',
        'order',
    ];

    public function aboutWhy(): BelongsTo
    {
        return $this->belongsTo(AboutWhy::class);
    }
}
