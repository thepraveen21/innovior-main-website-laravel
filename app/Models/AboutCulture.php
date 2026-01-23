<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class AboutCulture extends Model
{
    protected $table = 'about_culture';

    protected $fillable = [
        'heading',
        'description',
    ];

    public function highlights(): HasMany
    {
        return $this->hasMany(AboutCultureHighlight::class);
    }
}
