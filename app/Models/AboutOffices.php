<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class AboutOffices extends Model
{
    protected $table = 'about_offices';

    protected $fillable = [
        'heading',
        'subtitle',
    ];

    public function locations(): HasMany
    {
        return $this->hasMany(AboutOfficeLocation::class);
    }
}
