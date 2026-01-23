<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class AboutPartners extends Model
{
    protected $table = 'about_partners';

    protected $fillable = [
        'heading',
        'subtitle',
    ];

    public function items(): HasMany
    {
        return $this->hasMany(AboutPartnerItem::class);
    }
}
