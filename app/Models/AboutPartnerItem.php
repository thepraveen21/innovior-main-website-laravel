<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AboutPartnerItem extends Model
{
    protected $table = 'about_partner_items';

    protected $fillable = [
        'about_partners_id',
        'icon',
        'title',
        'description',
        'order',
    ];

    public function partners(): BelongsTo
    {
        return $this->belongsTo(AboutPartners::class);
    }
}
